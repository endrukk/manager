// The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
(function() {
    var burger = document.querySelector('.burger'),
        dropdown = document.querySelector('.dropdown'),
        menu = document.querySelector('#'+burger.dataset.target),
        modalClosers = document.getElementsByClassName('modal-closer'),
        modalOpen = document.querySelector('.modal-open');

    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });

    if(typeof(dropdown) !== 'undefined' && dropdown !== null)
        dropdown.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.classList.toggle('is-active');
        });

    if(typeof(modalOpen) !== 'undefined' && modalOpen !== null)
        modalOpen.addEventListener('click', function(event) {
            let modal = document.querySelector('#' + this.getAttribute("data-toggle") + '.modal');
            event.stopPropagation();
            modal.classList.add('is-active');
        });

    if(typeof(modalClosers) !== 'undefined' && modalClosers !== null && modalClosers.length > 0)
        Array.from(modalClosers).forEach(function (modalCloser) {
            modalCloser.addEventListener('click', function(event) {
                let modal = document.querySelector('.modal');
                event.stopPropagation();
                modal.classList.remove('is-active');
            });
        });

})();

