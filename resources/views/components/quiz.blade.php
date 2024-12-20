<div class="services_buttons quiz flex-column mx-auto m60">
    <p>Пройдите квиз и получите <br>10% скидку на <br>подходящий для вас веб-сайт</p>
    <button id="startQuiz" class="btn get-disc-btn no-line mx-auto"><span>Начать квиз</span></button>
</div>

<div id="quizModal" class="quiz-modal">
    <div class="quiz-content">
        <span class="close">&times;</span>
        <!-- Первый шаг: Ввод email -->
        <div id="quizStep0" class="quiz-step fade-slide-up">
            <p>Прежде чем мы начнём, введите ваш email:</p>
            <input type="email" class="field-input" id="userEmail" placeholder="Ваш email" required>
            <button id="startQuizButton" class="btn">Продолжить</button>
        </div>

        <!-- Вопрос 1 -->
        <div id="quizStep1" class="quiz-step fade-slide-up">
            <p>Планируете ли вы выставлять на сайт товары или услуги?</p>
            <label class="custom-radio">
                <input type="radio" name="step1" class="quiz-answer" data-next="2a"> Да
                <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step1" class="quiz-answer" data-next="5"> Нет
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Вопрос 2a -->
        <div id="quizStep2a" class="quiz-step fade-slide-up" ">
            <p>Планируете ли вы продавать товары или услуги через сайт?</p>
            <label class=" custom-radio">
            <input type="radio" name="step2" class="quiz-answer" data-next="3"> Да
            <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step2" class="quiz-answer" data-next="4"> Нет
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Вопрос 3 -->
        <div id="quizStep3" class="quiz-step fade-slide-up" ">
            <p>Кто будет выкладывать товары или услуги на сайт?</p>
            <label class=" custom-radio">
            <input type="radio" name="step3" class="quiz-answer" data-result="Интернет-магазин"> Только я/моя компания
            <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step3" class="quiz-answer" data-result="Маркетплейс"> Разные продавцы смогут
                добавлять свои товары/услуги
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Вопрос 4 -->
        <div id="quizStep4" class="quiz-step fade-slide-up" ">
            <p>Кто будет размещать товары или услуги на сайте?</p>
            <label class=" custom-radio">
            <input type="radio" name="step4" class="quiz-answer" data-result="Сайт-каталог"> Только я/моя компания
            <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step4" class="quiz-answer" data-result="Доска объявлений"> Любой пользователь
                сможет размещать
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Вопрос 5 -->
        <div id="quizStep5" class="quiz-step fade-slide-up" ">
            <p>Как вы оцениваете объём информации, который будет размещён на сайте?</p>
            <label class=" custom-radio">
            <input type="radio" name="step5" class="quiz-answer" data-result="Лендинг"> Небольшой объём информации
            <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step5" class="quiz-answer" data-next="6"> Много информации
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Вопрос 6 -->
        <div id="quizStep6" class="quiz-step fade-slide-up" ">
            <p>Планируете ли вы интеграции с внешними платформами?</p>
            <label class=" custom-radio">
            <input type="radio" name="step6" class="quiz-answer" data-result="Корпоративный сайт"> Да
            <span class="checkmark"></span>
            </label>
            <label class="custom-radio">
                <input type="radio" name="step6" class="quiz-answer" data-result="Многостраничный сайт"> Нет
                <span class="checkmark"></span>
            </label>
        </div>

        <!-- Блок для отображения результата -->
        <div id="quizResult" class="fade-slide-up" ">
            <p>Ваш результат: <span id="quizFinalResult"></span></p>
            <button id="restartQuiz">Пройти квиз заново</button>
        </div>
    </div>
</div>