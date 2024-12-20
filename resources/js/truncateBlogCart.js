function cleanAndTruncateText(selector, maxLength) {
    var elements = document.querySelectorAll(selector);

    elements.forEach(function(element) {
        // Remove <br> tags
        element.innerHTML = element.innerHTML.replace(/<br\s*\/?>/gi, ' ');

        // Truncate text
        var text = element.textContent || element.innerText;
        if (text.length > maxLength) {
            element.textContent = text.substr(0, maxLength) + '...';
        }
    });
}