$(window).on("load", function () {
  $(".loaders").hide(200);
});
$(document).ready(function () {
  var currentPage = "{{ $currentPage }}";
  // console.log(currentPage);
  $(".nav-item").each(function () {
    var text = $(this).text().trim();
    // console.log(text);
    if (currentPage === text) {
      // console.log(currentPage === text);

      $(this).addClass("active");
    }
  });
});

// Ajax portfolio
$(".element").click(function () {
  var categoryName = $(this).find("p").data("category-name");
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
    },
    url: "/en/ajax-portfolio",
    method: "post",
    dataType: "json",
    data: {
      category: categoryName,
    }, //$(this).text()
    success: function (data) {
      $(".grid_portfolio").html("");
      data.forEach((p) => {
        $(".grid_portfolio").append(
          '<a href="/{{ $lang }}/portfolio/' +
            p["id"] +
            '" class="grid-item no-line"> <div class="columnPort"> <img src="/storage/' +
            p["photo"] +
            '" alt="Image"> ' +
            '</div> <div class="rowPort"> <div class="line"></div> <div class="gridTitle">' +
            p["title_{{ $lang }}"] +
            "</div> </div> </div> </div> </a>"
        );
      });
      $("#loadMoreButton").prop("disabled", false).addClass("relaod");
    },
  });
});

// Ajax Blog
$(".element-blog").click(function () {
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
    },
    url: "/en/ajax-blog",
    method: "post",
    dataType: "json",
    data: {
      category_blog: $(this).text(),
    },
    success: function (data) {
      $(".grid_blog").html("");
      data.forEach((i) => {
        var additionalClass =
          i["id"] % 2 == 0 && i["id"] != 2 ? "add-margin-blog" : "";
        var html =
          '<a href="/{{ $lang }}/blog/' +
          i["id"] +
          '" class="grid-item ' +
          additionalClass +
          ' no-line">' +
          '   <div class="block">' +
          '       <div class="row_blog">' +
          '           <h2 class="subtBlog">' +
          i["what"] +
          "</h2>" +
          '           <h1 class="titleBlog">' +
          i["title_{{ $lang }}"] +
          "</h1>" +
          '           <div class="body-text">' +
          i["desc_{{ $lang }}"] +
          "</div>" +
          "       </div>" +
          '       <div class="arrow d-flex align-items-center justify-content-center">' +
          '           <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i>' +
          "       </div>" +
          "   </div>" +
          "</a>";

        $(".grid_blog").append(html);
        cleanAndTruncateText(".body-text", 400); // Adjust 150 to your desired max length
      });
      $("#loadMoreButton").prop("disabled", false).addClass("relaod");
    },
  });
});

//
//////////////////////////////// GPT LOAD-MORE//////////////////////
$(document).ready(function () {
  let pageOffset = 6;
  let categoryName = "All";
  let lang = $(".grid_portfolio").data("lang"); // Получаем значение языка из data-lang

  $("#loadMoreButton").on("click", function () {
    $(".reload-icon").addClass("rotate-more-btn");

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
      },
      url: `/${lang}/show-more/${pageOffset}/${categoryName}`,
      method: "GET",
      dataType: "json",
      success: function (response) {
        if (response.data.length > 0) {
          response.data.forEach((p, index) => {
            // Вычисляем общий индекс для нового элемента
            let currentIndex = pageOffset + index;
            // Добавляем класс `add-padding` для нечетных индексов
            let additionalClass = currentIndex % 2 !== 0 ? "add-padding" : "";

            $(".grid_portfolio").append(
              `<a href="/${lang}/portfolio/${
                p.id
              }" class="grid-item ${additionalClass} no-line">
                                <div class="columnPort">
                                    <img src="/storage/${p.photo}" alt="Image">
                                 
                                       
                                        <div class="rowPort">
                                            <div class="line"></div>
                                            <div class="gridTitle">${
                                              p["title_" + lang]
                                            }</div>
                                        </div>
                                    </div>
                                </div>
                            </a>`
            );
          });
          pageOffset += 3;

          if (!response.hasMore) {
            $("#loadMoreButton").hide();
          }
        }
        $(".reload-icon").removeClass("rotate-more-btn");
      },
      error: function () {
        console.error("Ошибка загрузки данных");
        $(".reload-icon").removeClass("rotate-more-btn");
      },
    });
  });
});

$(document).ready(function () {
  $(".element:first").addClass("selected");
});

const elements = document.querySelectorAll(".element");
elements.forEach((element) => {
  element.addEventListener("click", () => {
    elements.forEach((el) => el.classList.remove("selected"));
    element.classList.add("selected");
    $("#loadMoreButton").addClass("reload");
    $(".reload").show();
  });
});

$(".portf-slider").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  infinite: false,
  prevArrow: "<div></div>",
  nextArrow: '<div class="next-portf-arrow"></div>',
  responsive: [
    {
      breakpoint: 991, // Когда ширина экрана меньше 991px
      settings: {
        slidesToShow: 1, // Показываем 1 слайд
        slidesToScroll: 1,
      },
    },
  ],
});



$(document).ready(function () {
  // Функция для анимации чисел
  function animateNumbers(element, start, end, duration) {
    let range = end - start;
    let current = start;
    let increment = end > start ? 1 : -1;
    let stepTime = Math.abs(Math.floor(duration / range));
    let hasPlus = $(element).data("target").includes("+"); // Проверяем, есть ли плюс

    let timer = setInterval(function () {
      current += increment;
      $(element).text(current + (hasPlus ? "+" : ""));
      if (current >= end) {
        clearInterval(timer);
        $(element).text(end + (hasPlus ? "+" : "")); // Финальная точка с плюсом
      }
    }, stepTime);
  }

  // Проверка на видимость элемента
  function checkVisibility() {
    $(".stats_count").each(function () {
      let $this = $(this);
      let textValue = $this.attr("data-target").replace("+", ""); // Убираем знак "+" для правильного подсчета
      let targetValue = parseInt(textValue); // Превращаем текст в число

      // Проверка, виден ли элемент
      let windowHeight = $(window).height();
      let scrollTop = $(window).scrollTop();
      let elementOffsetTop = $this.offset().top;
      let elementHeight = $this.outerHeight();

      // Условие видимости элемента
      if (
        elementOffsetTop < scrollTop + windowHeight &&
        elementOffsetTop + elementHeight > scrollTop
      ) {
        // Элемент виден — запускаем анимацию
        if (!$this.hasClass("animating")) {
          animateNumbers($this, 0, targetValue, 2000);
          $this.addClass("animating");
        }
      } else {
        // Элемент выходит за пределы видимости — сбрасываем класс, чтобы анимация могла быть запущена заново
        $this.removeClass("animating");
        $this.text("0+"); // Возвращаем элемент к исходному состоянию
      }
    });
  }

  // Отслеживаем скролл и проверяем видимость
  $(window).on("scroll", function () {
    checkVisibility();
  });

  // Проверяем видимость элементов при загрузке страницы
  checkVisibility();
});

$(document).ready(function () {
  let userEmail = "";

  // Открыть модальное окно и начать с первого шага (ввод email)
  $("#startQuiz").on("click", function () {
    $("#quizModal").addClass("show");

    // Проверяем, есть ли уже сохраненный email
    if (userEmail) {
      $("#quizStep1").fadeIn().addClass("active"); // Переходим сразу к первому вопросу
    } else {
      $("#quizStep0").addClass("active").fadeIn(); // Сначала показываем ввод email
    }
  });

  // Закрыть модальное окно
  $(".close").on("click", function () {
    $("#quizModal").removeClass("show");
    resetQuiz();
  });

  // Переход к следующему вопросу после ввода email
  $("#startQuizButton").on("click", function () {
    var email = $("#userEmail").val();
    if (email && validateEmail(email)) {
      userEmail = email; // Сохраняем email
      $("#quizStep0")
        .removeClass("active")
        .fadeOut(function () {
          $("#quizStep1").fadeIn().addClass("active"); // Переход к первому вопросу
        });
    } else {
      alert("Пожалуйста, введите корректный email.");
    }
  });

  // Валидация email
  function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // Логика переключения вопросов с анимацией
  $(".quiz-answer").on("change", function () {
    var nextStep = $(this).data("next");
    var result = $(this).data("result");

    if (result) {
      $("#quizFinalResult").text(result);
      $(".quiz-step").removeClass("active").hide();
      $("#quizResult").fadeIn().addClass("active");
    } else if (nextStep) {
      $(".quiz-step")
        .removeClass("active")
        .fadeOut(function () {
          $("#quizStep" + nextStep)
            .fadeIn()
            .addClass("active");
        });
    }
  });

  // Сбросить квиз
  function resetQuiz() {
    $(".quiz-step").removeClass("active").hide();
    $("#quizResult").removeClass("active").hide();
    $("#userEmail").val(""); // Очищаем поле ввода email
    userEmail = ""; // Сбрасываем сохраненный email
  }

  // Перезапустить квиз
  $("#restartQuiz").on("click", function () {
    resetQuiz();
    $("#quizStep1").fadeIn().addClass("active"); // Переходим сразу к первому вопросу
  });
});
