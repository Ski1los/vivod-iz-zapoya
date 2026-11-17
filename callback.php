<section class="section callback">
    <div class="container">
        <div class="callback__inner">
            <div class="callback__content">
                <div class="section__header section__header_left">
                    <h2 class="section__title">Записаться на прием</h2>
                </div>
                <form class="callback__form form js-form">
                    <div class="form__field">
                        <div class="form__field-item">
                            <input data-required="Y" class="form__field-input form__field-input_white" type="text" name="name" placeholder="Введите имя">
                            <span class="form__field-error">Заполните обязательное поле</span>
                        </div>
                        <div class="form__field-item">
                            <input data-required="Y" class="form__field-input form__field-input_white" type="tel" name="phone" placeholder="+7 (999) 999-99-99">
                            <span class="form__field-error">Заполните обязательное поле</span>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit" class="btn btn_fill btn_small-icon btn_middle form__button-item">
                            <span>Отправить</span>
                            <img src="<?=get_template_directory_uri();?>/assets/image/arrow-white.svg" alt="Button">
                        </button>
                    </div>
                    
                    <?if (!empty(THEME_SETTINGS['PAGE']['POLICY'])):?>
                        <div class="form__policy">Нажимая на кнопку  вы подтверждаете, что ознакомились с <a href="<?=get_permalink(THEME_SETTINGS['PAGE']['POLICY']);?>">политикой конфиденциальности</a></div>
                    <?endif;?>
        
                    <input type="hidden" name="theme" value="Оставить заявку">
                </form>
            </div>
            <div class="callback__image">
                <img src="<?=get_template_directory_uri();?>/assets/image/hero-man.webp" alt="Man">
            </div>
        </div>
    </div>
</section>