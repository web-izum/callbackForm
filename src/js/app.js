document.addEventListener('DOMContentLoaded', function (){

    // modal
    function bindModal(triggerSelector, modalSelector, closeSelector)
    {
        var trigger = document.querySelectorAll(triggerSelector),
            modal   = document.querySelector(modalSelector),
            close   = document.querySelector(closeSelector);

        trigger.forEach(item => {

            item.addEventListener('click', (e) => {
                if(e.target) {
                    e.preventDefault();
                }
                modal.style.display = "block";
                close.style.display = "block";
                document.body.style.overflow = "hidden";
            });

            close.addEventListener('click', () => {
                modal.style.display = "none";
                close.style.display = "none";
                document.body.style.overflow = "";
            });
        });
    }
    bindModal('.open-popup', '.call-back-form', '.overlay');
    // modal finish

    // validate form
   (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
          .forEach(function (form) {
             form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                   event.preventDefault()
                   event.stopPropagation()
                }

                form.classList.add('was-validated')
             }, false)
          })
   })()
    // validate form finish

    // ajax data form

    const forms = document.querySelectorAll('.form');

    const ajaxSend = async function (formData, form)  {
        const fetchResp = await fetch('action.php', {
            method: 'POST',
            body: formData
        });
        if (!fetchResp.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${fetchResp.status}`);
        }
        return await fetchResp.text();
    };

    forms.forEach( form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            ajaxSend(formData, form)
                .then((response) => {
                    form.reset();
                })
                .catch((err) => console.error(err))
        });
    });
    // ajax data form finish
});