<section class="section cost-calculator" id="calculator">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Рассчитайте стоимость вывода из запоя</h2>
            <p class="section__subtitle">Ответьте на 4 вопроса и получите ориентировочную цену + подбор капельницы</p>
        </div>
        
        <div class="calculator-wrapper">
            <div class="calc-progress">
                <div class="calc-progress-bar" id="progressBar" style="width: 25%;"></div>
                <div class="calc-progress-text">Шаг <span id="currentStep">1</span> из 4</div>
            </div>
            
            <!-- Шаг 1 -->
            <div class="calc-step active" data-step="1">
                <h3 class="calc-question">Как долго длится запой?</h3>
                <div class="calc-options">
                    <div class="calc-option" data-value="1" data-price="3500" onclick="selectOption(this, 1)"><div class="calc-option-icon">📅</div><div class="calc-option-title">1-3 дня</div><div class="calc-option-desc">Комплекс «Лайт»</div></div>
                    <div class="calc-option" data-value="2" data-price="6500" onclick="selectOption(this, 1)"><div class="calc-option-icon"></div><div class="calc-option-title">3-7 дней</div><div class="calc-option-desc">Комплекс «Стандарт»</div></div>
                    <div class="calc-option" data-value="3" data-price="10000" onclick="selectOption(this, 1)"><div class="calc-option-icon">🗓️</div><div class="calc-option-title">1-2 недели</div><div class="calc-option-desc">Комплекс «Полный»</div></div>
                    <div class="calc-option" data-value="4" data-price="15000" onclick="selectOption(this, 1)"><div class="calc-option-icon">📊</div><div class="calc-option-title">Более 2 недель</div><div class="calc-option-desc">Комплекс «Премиум»</div></div>
                </div>
            </div>
            
            <!-- Шаг 2 -->
            <div class="calc-step" data-step="2">
                <h3 class="calc-question">Возраст и хронические заболевания?</h3>
                <div class="calc-options">
                    <div class="calc-option" data-value="1" data-price="0" onclick="selectOption(this, 2)"><div class="calc-option-icon">💪</div><div class="calc-option-title">До 40 лет, без заболеваний</div><div class="calc-option-desc">Стандартная схема (+0 ₽)</div></div>
                    <div class="calc-option" data-value="2" data-price="1500" onclick="selectOption(this, 2)"><div class="calc-option-icon">⚕️</div><div class="calc-option-title">40-55 лет, есть заболевания</div><div class="calc-option-desc">Расширенный состав (+1 500 ₽)</div></div>
                    <div class="calc-option" data-value="3" data-price="3000" onclick="selectOption(this, 2)"><div class="calc-option-icon">🏥</div><div class="calc-option-title">Старше 55 лет</div><div class="calc-option-desc">Усиленная терапия (+3 000 ₽)</div></div>
                    <div class="calc-option" data-value="4" data-price="5000" onclick="selectOption(this, 2)"><div class="calc-option-icon">🩺</div><div class="calc-option-title">Тяжелые сопутствующие болезни</div><div class="calc-option-desc">Индивидуальный подход (+5 000 ₽)</div></div>
                </div>
            </div>
            
            <!-- Шаг 3 -->
            <div class="calc-step" data-step="3">
                <h3 class="calc-question">Текущее состояние пациента?</h3>
                <div class="calc-options">
                    <div class="calc-option" data-value="1" data-price="0" onclick="selectOption(this, 3)"><div class="calc-option-icon">😐</div><div class="calc-option-title">Удовлетворительное</div><div class="calc-option-desc">Самостоятельно ходит (+0 ₽)</div></div>
                    <div class="calc-option" data-value="2" data-price="1500" onclick="selectOption(this, 3)"><div class="calc-option-icon">😟</div><div class="calc-option-title">Среднее</div><div class="calc-option-desc">Слабость, тошнота (+1 500 ₽)</div></div>
                    <div class="calc-option" data-value="3" data-price="3500" onclick="selectOption(this, 3)"><div class="calc-option-icon">😰</div><div class="calc-option-title">Тяжелое</div><div class="calc-option-desc">Не встает, рвота, тремор (+3 500 ₽)</div></div>
                    <div class="calc-option" data-value="4" data-price="5000" onclick="selectOption(this, 3)"><div class="calc-option-icon">🚨</div><div class="calc-option-title">Критическое</div><div class="calc-option-desc">Экстренное вытрезвление (+5 000 ₽)</div></div>
                </div>
            </div>
            
            <!-- Шаг 4 -->
            <div class="calc-step" data-step="4">
                <h3 class="calc-question">Где и когда нужна помощь?</h3>
                <div class="calc-options">
                    <div class="calc-option" data-value="1" data-price="0" onclick="selectOption(this, 4)"><div class="calc-option-icon">🏠</div><div class="calc-option-title">На дому, в течение дня</div><div class="calc-option-desc">Стандартный выезд (+0 ₽)</div></div>
                    <div class="calc-option" data-value="2" data-price="2000" onclick="selectOption(this, 4)"><div class="calc-option-icon">⚡</div><div class="calc-option-title">На дому, срочно (до 1 часа)</div><div class="calc-option-desc">Экстренный выезд (+2 000 ₽)</div></div>
                    <div class="calc-option" data-value="3" data-price="3000" onclick="selectOption(this, 4)"><div class="calc-option-icon">🏨</div><div class="calc-option-title">В стационаре клиники</div><div class="calc-option-desc">Круглосуточное наблюдение (+3 000 ₽)</div></div>
                    <div class="calc-option" data-value="4" data-price="4000" onclick="selectOption(this, 4)"><div class="calc-option-icon">🌙</div><div class="calc-option-title">Ночной вызов (22:00-08:00)</div><div class="calc-option-desc">Ночной тариф (+4 000 ₽)</div></div>
                </div>
            </div>
            
            <!-- Результат и Форма -->
            <div class="calc-step" data-step="5">
                <div class="calc-result">
                    <div class="calc-result-icon">✅</div>
                    <h3 class="calc-result-title">Расчет готов!</h3>
                    <div class="calc-result-price">
                        <div class="calc-result-label">Ориентировочная стоимость:</div>
                        <div class="calc-result-value" id="totalPrice">0 ₽</div>
                        <div class="calc-result-note">* Точную цену назовет врач после консультации</div>
                    </div>
                    <div class="calc-result-dropper">
                        <div class="calc-result-label">Рекомендуемый состав капельницы:</div>
                        <div class="calc-result-value" id="dropperType" style="font-size: 16px; color: #333; font-weight: 500;">—</div>
                    </div>

                    <form class="callback__form form js-form calc-final-form" style="margin-top: 30px; text-align: left; max-width: 400px; margin-left: auto; margin-right: auto;">
                        <div class="form__field" style="display: flex; flex-direction: column; gap: 15px;">
                            <div class="form__field-item">
                                <input data-required="Y" class="form__field-input" type="text" name="name" placeholder="Введите ваше имя" required style="width: 100%; padding: 14px; border: 2px solid #e0e0e0; border-radius: 8px; background: #fff; color: #333; font-size: 16px;">
                            </div>
                            <div class="form__field-item">
                                <input data-required="Y" class="form__field-input" type="tel" name="phone" placeholder="+7 (999) 999-99-99" required style="width: 100%; padding: 14px; border: 2px solid #e0e0e0; border-radius: 8px; background: #fff; color: #333; font-size: 16px;">
                            </div>
                        </div>
                        <input type="hidden" name="theme" id="calcThemeValue" value="Заявка из калькулятора">
                        <input type="hidden" name="calc_details" id="calcDetailsValue" value="">
                        <div class="form__button" style="margin-top: 20px;">
                            <button type="submit" class="btn btn_fill btn_middle form__button-item" style="width: 100%; background: #e74c3c; color: #fff; border: none; padding: 16px; border-radius: 8px; font-size: 16px; font-weight: 700; cursor: pointer;">
                                <span>Получить расчет и заказать звонок</span>
                            </button>
                        </div>
                        <div class="form__policy" style="text-align: center; font-size: 12px; color: #999; margin-top: 15px;">
                            Нажимая на кнопку, вы соглашаетесь с <a href="/politika-konfidentsialnosti/" style="color: #e74c3c; text-decoration: underline;">политикой конфиденциальности</a>
                        </div>
                    </form>

                    <div class="calc-result-actions" style="margin-top: 20px;">
                        <button class="btn btn_stroke-red btn_middle" onclick="restartCalculator()" style="width: auto; border: 2px solid #e74c3c; color: #e74c3c; background: transparent; padding: 10px 20px; border-radius: 8px; font-weight: 500; cursor: pointer; transition: 0.3s; font-size: 15px;">
                            🔄 Рассчитать заново
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="calc-nav" id="calcNav" style="margin-top: 30px; text-align: center;">
                <button class="btn btn_stroke" onclick="prevStep()" id="prevBtn" style="display: none; padding: 10px 25px; border: 2px solid #ccc; border-radius: 8px; background: #fff; cursor: pointer;">← Назад</button>
            </div>
        </div>
    </div>
</section>

<style>
.cost-calculator { padding: 60px 0; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); }
.calculator-wrapper { max-width: 900px; margin: 0 auto; background: #fff; border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); }
.calc-progress { margin-bottom: 30px; }
.calc-progress-bar { height: 8px; background: linear-gradient(90deg, #e74c3c, #c0392b); border-radius: 4px; transition: width 0.4s ease; }
.calc-progress-text { text-align: center; margin-top: 10px; color: #666; font-size: 14px; }
.calc-step { display: none; animation: fadeInStep 0.4s ease; }
.calc-step.active { display: block; }
@keyframes fadeInStep { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.calc-question { text-align: center; font-size: 22px; margin-bottom: 25px; color: #333; }
.calc-options { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
.calc-option { border: 2px solid #e0e0e0; border-radius: 12px; padding: 20px; cursor: pointer; transition: all 0.3s ease; text-align: center; background: #fff; }
.calc-option:hover { border-color: #e74c3c; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(231, 76, 60, 0.15); }
.calc-option.selected { border-color: #e74c3c; background: #fff5f5; box-shadow: 0 5px 20px rgba(231, 76, 60, 0.2); }
.calc-option-icon { font-size: 32px; margin-bottom: 10px; }
.calc-option-title { font-weight: 700; color: #333; margin-bottom: 5px; font-size: 16px; }
.calc-option-desc { color: #888; font-size: 13px; }
.calc-result { text-align: center; padding: 20px; }
.calc-result-icon { font-size: 64px; margin-bottom: 20px; }
.calc-result-title { font-size: 26px; margin-bottom: 25px; color: #333; }
.calc-result-price, .calc-result-dropper { background: #f8f9fa; border-radius: 12px; padding: 20px; margin-bottom: 15px; }
.calc-result-label { color: #666; font-size: 14px; margin-bottom: 8px; }
.calc-result-value { font-size: 32px; font-weight: 700; color: #e74c3c; }
.calc-result-note { font-size: 12px; color: #999; margin-top: 8px; }
@media (max-width: 768px) {
    .calculator-wrapper { padding: 25px 20px; }
    .calc-options { grid-template-columns: 1fr; }
    .calc-question { font-size: 18px; }
    .calc-result-value { font-size: 26px; }
}
</style>

<script>
let currentStep = 1; const totalSteps = 4; const answers = {};
function selectOption(element, step) {
    document.querySelector(`.calc-step[data-step="${step}"]`).querySelectorAll('.calc-option').forEach(opt => opt.classList.remove('selected'));
    element.classList.add('selected'); answers[step] = element.dataset.value;
    setTimeout(() => { if (step < totalSteps) { goToStep(step + 1); } else { showResult(); } }, 400);
}
function goToStep(step) {
    document.querySelectorAll('.calc-step').forEach(s => s.classList.remove('active'));
    document.querySelector(`.calc-step[data-step="${step}"]`).classList.add('active');
    currentStep = step; document.getElementById('currentStep').textContent = step;
    document.getElementById('progressBar').style.width = (step / totalSteps * 100) + '%';
    document.getElementById('prevBtn').style.display = step > 1 ? 'inline-block' : 'none';
}
function prevStep() { if (currentStep > 1) goToStep(currentStep - 1); }
function showResult() {
    let total = 0;
    for (let step = 1; step <= 4; step++) {
        const selectedOption = document.querySelector(`.calc-step[data-step="${step}"] .calc-option.selected`);
        if (selectedOption) total += parseInt(selectedOption.dataset.price);
    }
    const s1 = parseInt(answers[1]), s2 = parseInt(answers[2]), s3 = parseInt(answers[3]);
    let dropperText = '';
    if (s1 >= 3 || s3 >= 3 || s2 >= 3) dropperText = 'Усиленная терапия: полный спектр препаратов + седативные + кардиопротекция (Комплекс Премиум/Экстренный)';
    else if (s1 === 2 || s3 === 2 || s2 === 2) dropperText = 'Расширенная детоксикация: физраствор + глюкоза + витамины + гепатопротекторы + магнезия (Комплекс Полный)';
    else dropperText = 'Базовая детоксикация: физраствор + глюкоза + витамины (Комплекс Лайт/Стандарт)';
    
    document.getElementById('totalPrice').textContent = total.toLocaleString('ru-RU') + ' ₽';
    document.getElementById('dropperType').textContent = dropperText;
    document.getElementById('calcThemeValue').value = `Заявка из калькулятора: ~${total.toLocaleString('ru-RU')} ₽. ${dropperText}`;
    document.getElementById('calcDetailsValue').value = `Выбор: 1.${answers[1]}, 2.${answers[2]}, 3.${answers[3]}, 4.${answers[4]}`;
    
    document.querySelectorAll('.calc-step').forEach(s => s.classList.remove('active'));
    document.querySelector('.calc-step[data-step="5"]').classList.add('active');
    document.getElementById('calcNav').style.display = 'none';
    document.getElementById('progressBar').style.width = '100%';
}
function restartCalculator() {
    for (let key in answers) delete answers[key]; currentStep = 1;
    document.querySelectorAll('.calc-option').forEach(opt => opt.classList.remove('selected'));
    document.getElementById('calcNav').style.display = 'block';
    const form = document.querySelector('.calc-final-form'); if (form) form.reset();
    goToStep(1);
}
</script>