document.addEventListener('DOMContentLoaded', () => {
    let headerMenu = document.querySelector('.header__menu');
    let modalFeedback = document.querySelector('.modal-feedback');
    document.addEventListener('click', ({ target }) => {
        // burger
        if (target.classList.contains('burger')) {
            target.classList.toggle('_opened');
            headerMenu.classList.toggle('active');
        }
        if (target.classList.contains('js-btn-modal-feedback')) {
            modalFeedback.classList.add('active');
        }
    });
    if(modalFeedback) {
        modalFeedback.addEventListener('click', ({target}) => {
            if(target.classList.contains('modal-feedback') || target.closest('.modal__block-close')) {
                modalFeedback.classList.remove('active');
            }
        });
    }
    let headerLangBtn = document.querySelector('.header__lang-active');
    let headerLangItems = document.querySelector('.header__lang-other');
    headerLangBtn.addEventListener('click', function(){
        this.classList.toggle('active');
        headerLangItems.classList.toggle('active');
    });

    // modal career
    const careerSection = document.querySelector('.career');
    if(careerSection) {
        const modalCareer = document.querySelector('.modal-career');
        const fileResume = modalCareer.querySelector('#file');
        const fileText = modalCareer.querySelector('.modal__block-file span');
        fileResume.addEventListener('change', function(){
            const fileName = this.files[0]?.name;
            if(fileName) {
                fileText.innerHTML = fileName;
            } else {
                fileText.innerHTML = 'выбрать файл резюме';
            }
        });

        const selectResume = modalCareer.querySelector('.js-career-select');
        const modalTitleResume = modalCareer.querySelector('.js-career-title span');
        selectResume.addEventListener('change', function(){
            const selectTitle = this.options[this.options.selectedIndex].text;
            modalTitleResume.innerHTML = selectTitle;
        });

        careerSection.addEventListener('click', function({target}){
            if(target.classList.contains('js-response-btn')) {
                const id = target.getAttribute('data-id');
                modalCareer.classList.add('active');
                selectResume.options[id].selected = true;
                modalTitleResume.innerHTML = selectResume.options[id].text;
            }
        });

        modalCareer.addEventListener('click', ({target}) => {
            if(target.classList.contains('modal-career') || target.closest('.modal__block-close')) {
                modalCareer.classList.remove('active');
            }
        });
    }

    // calculator
    const calcSection = document.querySelector('.calc');
    if(calcSection) {
        const prevBtn = calcSection.querySelector('.calc__buttons-item.prev');
        const nextBtn = calcSection.querySelector('.calc__buttons-item.next');
        const submitBtn = calcSection.querySelector('.calc__buttons-item.submit');
        const stepsCalc = calcSection.querySelectorAll('.calc__step');
        const secondStep = calcSection.querySelector('.calc__step-2');
        const thirdStepPackage = calcSection.querySelector('#package-solution');
        const thirdStepIndividual = calcSection.querySelector('#individual-elements');
        const calcStepWrap = calcSection.querySelector('.calc__wrap-steps');
        let calcTotalPrice = calcSection.querySelector('.calc__total-summa span');
        let calcTotalPriceInput = calcSection.querySelector('#totalSumInput');
        let currentStep = 0;
        prevBtn.addEventListener('click', prevStep);
        nextBtn.addEventListener('click', nextStep);
        submitBtn.addEventListener('click', (e) => {
            // e.preventDefault();
            // let data = getDataCheckboxes();
            // console.log(data);
        });
        function nextStep() {
            if(validateStep()) {
                if(currentStep < stepsCalc.length - 1) {
                    stepsCalc[currentStep].classList.remove('active');
                    currentStep++;
                    stepsCalc[currentStep].classList.add('active');
                }
            } else {
                alert('Заполните обязательные поля');
            }
            checkStep();
        }
        function prevStep() {
            if(currentStep > 0) {
                let calcTotalPrice = calcSection.querySelector('.calc__total-summa span');
                stepsCalc[currentStep].querySelectorAll('input').forEach(item => {
                    if(item.hasAttribute('data-price') && item.checked) {
                        let summ =+ item.getAttribute('data-price');
                        calcTotalPrice.innerHTML = +(calcTotalPrice.innerHTML) - summ;
                        calcTotalPriceInput.value = +(calcTotalPriceInput.value) - summ;
                    }
                    if((item.type == 'checkbox') || (item.type == 'radio')) {
                        item.checked = false;
                    }
                })
                stepsCalc[currentStep].classList.remove('active');
                currentStep--;
                stepsCalc[currentStep].classList.add('active');
            }
            checkStep();
        }
        function checkStep() {
            if(currentStep > 0) {
                prevBtn.classList.add('active');
            }
            if(currentStep == 5) {
                nextBtn.classList.add('disabled');
                submitBtn.classList.add('active');

            } else {
                nextBtn.classList.remove('disabled');
                submitBtn.classList.remove('active');
            }
            if(currentStep <= 0) {
                prevBtn.classList.remove('active');
            }
        }
        function validateStep() {
            let currentStepBlock = calcSection.querySelector('.calc__step.active');
            if(currentStep == 0) {
                return Array.from(
                    currentStepBlock.querySelectorAll('.js-required-field')
                    ).every(field => field.value != '') && currentStepBlock.querySelector('input[type="radio"]:checked');
            }
            if(currentStep == 1) {
                return currentStepBlock.querySelector('input[type="radio"]:checked');
            }
            if(currentStep == 2) {
                if(thirdStepPackage.classList.contains('active')) {
                    return currentStepBlock.querySelector('input[type="radio"]:checked');
                } else {
                    return currentStepBlock.querySelector('input[type="checkbox"]:checked');
                }
            }
            return true;
        }
        function getDataCheckboxes() {
            const brand = calcSection.querySelector('.js-brand').value;
            const model = calcSection.querySelector('.js-model').value;
            const year = calcSection.querySelector('.js-year').value;
            const equipment = calcSection.querySelector('.js-equipment').value;
            const typeCar = calcSection.querySelector('.calc__step-1-radios input:checked').value;
            const solution = calcSection.querySelector('input:checked[name="type-solution"]').value;
            const packages = calcSection?.querySelector('input:checked[name="type-package"]')?.value;
            const individualElements = Array.from(calcSection.querySelectorAll('.calc__step-individual__items input:checked')).reduce((acc, item) => {
                acc.push(item.value);
                return acc;
            }, []);
            const filmBrand = calcSection?.querySelector('input:checked[name="type-brand"]')?.value;
            const additionally = Array.from(calcSection.querySelectorAll('.calc__step-additionally input:checked')).reduce((acc, item) => {
                acc.push(item.value);
                return acc;
            }, []);
            const name = calcSection.querySelector('.js-name').value;
            const phone = calcSection.querySelector('.js-phone').value;
            const checkFeedback = calcSection.querySelector('.js-feedback').checked;
            return {
                brand, // бренд машины
                model, // модель машины
                year, // год выпуска
                equipment, // комплектация
                typeCar, // тип кузова 
                solution, // решение 
                packages: packages != undefined ? packages : null, // пакет (полный || люкс)
                individualElements: [...individualElements], // индвидуальная сборка элементов
                filmBrand, // бренд плёнки 
                additionally: [...additionally], // опциональные элементы (дополнительные)
                name, // Имя
                phone, // Телефона
                checkFeedback, // Нужна ли обратная связь 
            }
        }

        secondStep.addEventListener('input', ({target}) => {
            if(target.id == 'type-solution-1') {
                thirdStepPackage.style.display = 'block';
                thirdStepIndividual.style.display = 'none';
                thirdStepPackage.classList.add('active');
                thirdStepIndividual.classList.remove('active');
            } else {
                thirdStepPackage.style.display = 'none';
                thirdStepIndividual.style.display = 'block';
                thirdStepPackage.classList.remove('active');
                thirdStepIndividual.classList.add('active');
            }
        });

        calcStepWrap.addEventListener('input', ({target}) => {
            if(target.hasAttribute('data-price') && target.type == 'checkbox') {
                let targetPrice = parseInt(target.getAttribute('data-price'));
                if(target.checked) {
                    calcTotalPrice.innerHTML = parseInt(calcTotalPrice.innerHTML) + targetPrice;
                    calcTotalPriceInput.value = parseInt(calcTotalPriceInput.value) + targetPrice;
                } else {
                    calcTotalPrice.innerHTML = parseInt(calcTotalPrice.innerHTML) - targetPrice;
                    calcTotalPriceInput.value = parseInt(calcTotalPriceInput.value) - targetPrice;
                }
            }
            if(target.hasAttribute('data-price') && target.type == 'radio') {
                let targetPrice = parseInt(target.getAttribute('data-price'));
                if (target.checked) {
                    calcTotalPrice.innerHTML = targetPrice;
                    calcTotalPriceInput.value = targetPrice;
                }
            }
        });
    }
});

window.onload = () => {
    $.fn.setCursorPosition = function(pos) {
        if ($(this).get(0).setSelectionRange) {
            $(this).get(0).setSelectionRange(pos, pos)
        } else if ($(this).get(0).createTextRange) {
            var range = $(this).get(0).createTextRange()
            range.collapse(true)
            range.moveEnd('character', pos)
            range.moveStart('character', pos)
            range.select()
        }
    }
    $('input[type="tel"]').on('click', function() {
        $(this).setCursorPosition(3)
    }).mask('+7 (999) 999 99 99');

    // $('.way').waypoint({
    //     handler: function() {
    //         $(this.element).addClass("way--active");

    //     },
    //     offset: '88%'
    // });
    // stark marq
    $('.marquee').marquee({
        direction: 'left',
        speed: 100,
        startVisible: true,
    });

    // sliders
    let taskSlider = new Swiper('.task__slider', {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            prevEl: '.task__arrow.prev',
            nextEl: '.task__arrow.next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });
    let stockSlider = new Swiper('.stock__slider', {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            prevEl: '.stock__arrow.prev',
            nextEl: '.stock__arrow.next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            }
        }
    });
    let reviewSlider = new Swiper('.review__slider', {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            prevEl: '.review__arrow.prev',
            nextEl: '.review__arrow.next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            }
        }
    });
    let innerSlider = new Swiper('.inner__slider', {
        autoplay: true,
        slidesPerView: 1,
        loop: true,
        effect: 'fade',
        navigation: {
            prevEl: '.inner__slider-arrow.prev',
            nextEl: '.inner__slider-arrow.next',
        },
    });
    let sertSlider = new Swiper('.about__sertificates-slider', {
        autoplay: true,
        loop: false,
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
            prevEl: '.about__sertificates-arrow.prev',
            nextEl: '.about__sertificates-arrow.next',
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            }
        }
    });

    // faq accords
    var activeAccordion = null; // переменная для хранения ссылки на текущий открытый блок

    $(".js-accordeons__item-body").hide(); // скрываем все блоки с контентом при загрузке страницы

    $(".js-accordeons__item-title").click(function () {
        // при клике на заголовок
        var accordionBody = $(this).next(".js-accordeons__item-body"); // находим блок контента, соответствующий данному заголовку
        if (accordionBody.is(":hidden")) {
            // если контент скрыт, то
            if (activeAccordion) {
                // если уже есть открытый блок
                activeAccordion.slideToggle(); // скрываем его
                activeAccordion
                    .prev(".js-accordeons__item-title")
                    .removeClass("active"); // удаляем класс "active" у соответствующего заголовка
            }
            $(this).addClass("active"); // открываем текущий блок
            accordionBody.slideToggle(); // плавно отображаем контент
            activeAccordion = accordionBody; // сохраняем ссылку на текущий открытый блок
        } else {
            // иначе
            $(this).removeClass("active"); // закрываем текущий блок
            accordionBody.slideToggle(); // плавно скрываем контент
            activeAccordion = null; // удаляем ссылку на открытый блок
        }
    });
    // 
};

// loader func
function submitForm() {
    $('#form_loader').show();
}
//Alert form
let alertt = document.querySelector(".alert--fixed");
let alertClose = document.querySelectorAll(".alert--close")
for (let item of alertClose) {
    item.addEventListener('click', function(event) {
        alertt.classList.remove("alert--active")
        alertt.classList.remove("alert--warning")
        alertt.classList.remove("alert--error")
    })
}