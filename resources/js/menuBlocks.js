// Защита linkAddress - запускается сразу
(function() {
    const FIXED_TEXT = "https://ltm.studio/";
    
    function protectLinkAddress() {
        const linkAddress = document.getElementById("linkAddress");
        if (!linkAddress) return;

        // Устанавливаем фиксированный текст
        linkAddress.textContent = FIXED_TEXT;
        
        // Также фиксируем href атрибут (если это ссылка)
        const FIXED_HREF = "/" + (window.location.pathname.split('/')[1] || 'ru') + "/";
        if (linkAddress.tagName === 'A' && linkAddress.getAttribute('href') !== FIXED_HREF) {
            linkAddress.setAttribute('href', FIXED_HREF);
        }

        // MutationObserver для отслеживания изменений - более агрессивный
        const observer = new MutationObserver((mutations) => {
            let shouldRestore = false;
            mutations.forEach((mutation) => {
                if (mutation.type === 'childList' || mutation.type === 'characterData') {
                    shouldRestore = true;
                }
            });
            
            if (shouldRestore) {
                // Используем requestAnimationFrame для немедленного восстановления
                requestAnimationFrame(() => {
                    if (linkAddress.textContent !== FIXED_TEXT && 
                        linkAddress.innerText !== FIXED_TEXT &&
                        linkAddress.innerHTML !== FIXED_TEXT) {
                        // Восстанавливаем через прямое обращение к текстовому узлу
                        if (linkAddress.firstChild && linkAddress.firstChild.nodeType === Node.TEXT_NODE) {
                            linkAddress.firstChild.textContent = FIXED_TEXT;
                        } else {
                            linkAddress.textContent = FIXED_TEXT;
                        }
                    }
                });
            }
        });

        observer.observe(linkAddress, {
            childList: true,
            characterData: true,
            subtree: true,
            attributes: false
        });

        // Переопределяем textContent, innerText и innerHTML
        try {
            // Проверяем, не переопределено ли уже свойство
            const existingTextContent = Object.getOwnPropertyDescriptor(linkAddress, 'textContent');
            const existingInnerText = Object.getOwnPropertyDescriptor(linkAddress, 'innerText');
            const existingInnerHTML = Object.getOwnPropertyDescriptor(linkAddress, 'innerHTML');
            
            // Если свойства уже переопределены и неконфигурируемы, пропускаем
            if (existingTextContent && !existingTextContent.configurable) {
                return;
            }

            // Сохраняем оригинальные дескрипторы
            const originalTextContent = Object.getOwnPropertyDescriptor(Node.prototype, 'textContent');
            const originalInnerText = Object.getOwnPropertyDescriptor(HTMLElement.prototype, 'innerText');
            const originalInnerHTML = Object.getOwnPropertyDescriptor(Element.prototype, 'innerHTML');

            // Блокируем textContent
            Object.defineProperty(linkAddress, 'textContent', {
                get: () => FIXED_TEXT,
                set: (value) => {
                    if (originalTextContent && originalTextContent.set) {
                        originalTextContent.set.call(linkAddress, FIXED_TEXT);
                    }
                },
                configurable: false
            });

            // Блокируем innerText
            Object.defineProperty(linkAddress, 'innerText', {
                get: () => FIXED_TEXT,
                set: (value) => {
                    if (originalInnerText && originalInnerText.set) {
                        originalInnerText.set.call(linkAddress, FIXED_TEXT);
                    }
                },
                configurable: false
            });

            // Блокируем innerHTML
            Object.defineProperty(linkAddress, 'innerHTML', {
                get: () => FIXED_TEXT,
                set: (value) => {
                    if (originalInnerHTML && originalInnerHTML.set) {
                        originalInnerHTML.set.call(linkAddress, FIXED_TEXT);
                    }
                },
                configurable: false
            });

            // Блокируем прямое изменение текстового узла
            if (linkAddress.firstChild && linkAddress.firstChild.nodeType === Node.TEXT_NODE) {
                const existingChildTextContent = Object.getOwnPropertyDescriptor(linkAddress.firstChild, 'textContent');
                if (!existingChildTextContent || existingChildTextContent.configurable) {
                    Object.defineProperty(linkAddress.firstChild, 'textContent', {
                        get: () => FIXED_TEXT,
                        set: (value) => {
                            if (originalTextContent && originalTextContent.set) {
                                originalTextContent.set.call(linkAddress.firstChild, FIXED_TEXT);
                            }
                        },
                        configurable: false
                    });
                }
            }
        } catch (e) {
            // Тихо игнорируем ошибки переопределения
            // console.warn('Не удалось переопределить свойства:', e);
        }
    }

    // Запускаем сразу и после загрузки DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', protectLinkAddress);
    } else {
        protectLinkAddress();
    }
    
    // Также запускаем с небольшой задержкой на случай поздней загрузки
    setTimeout(protectLinkAddress, 100);
    setTimeout(protectLinkAddress, 500);
    setTimeout(protectLinkAddress, 1000);
    setTimeout(protectLinkAddress, 2000);
    
    // Защита от изменения через делегирование событий
    document.addEventListener('mouseenter', function(e) {
        const linkAddress = document.getElementById("linkAddress");
        if (linkAddress && e.target) {
            const isTarget = e.target.id === 'instLink' || e.target.id === 'linkedLink';
            const isClosest = e.target.closest && e.target.closest('.media-links');
            if (isTarget || isClosest) {
                if (linkAddress.textContent !== FIXED_TEXT) {
                    linkAddress.textContent = FIXED_TEXT;
                }
            }
        }
    }, true);
    
    document.addEventListener('mouseover', function(e) {
        const linkAddress = document.getElementById("linkAddress");
        if (linkAddress && e.target) {
            const isTarget = e.target.id === 'instLink' || e.target.id === 'linkedLink';
            const isClosest = e.target.closest && e.target.closest('.media-links');
            if (isTarget || isClosest) {
                if (linkAddress.textContent !== FIXED_TEXT) {
                    linkAddress.textContent = FIXED_TEXT;
                }
            }
        }
    }, true);
})();

document.addEventListener("DOMContentLoaded", function () {
    let menuOpen = false;

    const menuButton = document.getElementById("menuButton");
    const mobileMenuBody = document.querySelector(".mobile-menu-body");
    const complexMenuModal = document.getElementById("complexMenuModal");
    const closeButtons = [
        document.getElementById("closeDesktopModal"),
        document.getElementById("closeMobileModal")
    ];

    // Синхронизируем состояние с Bootstrap модальным окном
    if (complexMenuModal) {
        // Когда модальное окно открывается
        complexMenuModal.addEventListener('shown.bs.modal', function () {
            menuOpen = true;
            animateBlocks();

            if (window.innerWidth < 991 && mobileMenuBody) {
                mobileMenuBody.style.height = `${window.innerHeight}px`;
            }
        });

        // Когда модальное окно закрывается
        complexMenuModal.addEventListener('hidden.bs.modal', function () {
            menuOpen = false;
        });
    }

    // Обработчик клика на кнопку меню
    if (menuButton) {
        menuButton.addEventListener("click", function () {
            // Bootstrap сам управляет открытием/закрытием через data-bs-toggle
            // Здесь мы только запускаем анимацию, если меню открывается
            if (!menuOpen && complexMenuModal) {
                // Проверяем, что модальное окно действительно открывается
                // Анимация будет запущена через событие shown.bs.modal
            }
        });
    }

    closeButtons.forEach(btn => {
        if (btn) {
            btn.addEventListener("click", function () {
                // Bootstrap сам закроет модальное окно через data-bs-dismiss="modal"
                // Состояние обновится через событие hidden.bs.modal
            });
        }
    });

    function animateBlocks() {
        const linkAddress = document.getElementById("linkAddress");
        if (!linkAddress) return;

        // Фиксируем оригинальный текст
        const FIXED_TEXT = "https://ltm.studio/";
        linkAddress.textContent = FIXED_TEXT;

        // Блокируем любые изменения через MutationObserver
        const observer = new MutationObserver((mutations) => {
            mutations.forEach(() => {
                // Немедленно восстанавливаем оригинальный текст
                if (linkAddress.textContent !== FIXED_TEXT) {
                    linkAddress.textContent = FIXED_TEXT;
                }
            });
        });

        observer.observe(linkAddress, {
            childList: true,
            characterData: true,
            subtree: true,
            attributes: false
        });

        // Переопределяем textContent и innerText для полной блокировки
        if (linkAddress) {
            // Проверяем, не переопределено ли уже свойство
            const existingTextContent = Object.getOwnPropertyDescriptor(linkAddress, 'textContent');
            const existingInnerText = Object.getOwnPropertyDescriptor(linkAddress, 'innerText');
            
            // Если свойства уже переопределены и неконфигурируемы, пропускаем
            if (existingTextContent && !existingTextContent.configurable) {
                return;
            }

            const originalTextContentSetter = Object.getOwnPropertyDescriptor(Node.prototype, 'textContent')?.set;
            const originalInnerTextSetter = Object.getOwnPropertyDescriptor(HTMLElement.prototype, 'innerText')?.set;
            
            try {
                Object.defineProperty(linkAddress, 'textContent', {
                    get: function() {
                        return FIXED_TEXT;
                    },
                    set: function(value) {
                        // Игнорируем любые попытки изменить текст
                        if (originalTextContentSetter) {
                            originalTextContentSetter.call(this, FIXED_TEXT);
                        }
                    },
                    configurable: false
                });

                Object.defineProperty(linkAddress, 'innerText', {
                    get: function() {
                        return FIXED_TEXT;
                    },
                    set: function(value) {
                        // Игнорируем любые попытки изменить текст
                        if (originalInnerTextSetter) {
                            originalInnerTextSetter.call(this, FIXED_TEXT);
                        }
                    },
                    configurable: false
                });
            } catch (e) {
                // Тихо игнорируем ошибки переопределения
                // console.warn('Не удалось переопределить свойства:', e);
            }
        }

        // Блокируем все события мыши на иконках социальных сетей
        const instLink = document.getElementById("instLink");
        const linkedLink = document.getElementById("linkedLink");
        const mediaLinks = document.querySelectorAll(".media-links a");

        const blockEvents = (element) => {
            if (!element) return;
            
            ['mouseenter', 'mouseover', 'mouseleave', 'mouseout', 'mousemove'].forEach(eventType => {
                element.addEventListener(eventType, (e) => {
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    // Восстанавливаем текст если он изменился
                    if (linkAddress.textContent !== FIXED_TEXT) {
                        linkAddress.textContent = FIXED_TEXT;
                    }
                }, { capture: true, passive: false });
            });
        };

        if (instLink) blockEvents(instLink);
        if (linkedLink) blockEvents(linkedLink);
        mediaLinks.forEach(link => blockEvents(link));
    }
});
