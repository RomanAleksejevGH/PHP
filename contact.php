<?php 
$title="Контакт";
include("tmp/header.php");?>
<div class="main">
    
        <div class="site_content">
            <div class="sidebar_container">
                <div class="sidebar">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1613.8456285056934!2d28.187629765121198!3d59.361022194225704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469448373a394b2f%3A0xf6deef6f0edb65e9!2z0JjQtNCwLdCS0LjRgNGD0LzQsNCw0YHQutC40Lkg0YbQtdC90YLRgCDQv9GA0L7RhNC10YHRgdC40L7QvdCw0LvRjNC90L7Qs9C-INC-0LHRgNCw0LfQvtCy0LDQvdC40Y8sINCd0LDRgNCy0YHQutC40Lkg0YTQuNC70LjQsNC7!5e0!3m2!1sru!2see!4v1612373506079!5m2!1sru!2see" 
                            width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                </div>
            </div>
            <div class="content">
                    <h2>Свяжитесь с нами</h2>
                    <div class="send send_contact">
                            <form method="post" action="#" id="contact">
                                <input type="text" name="review_name" placeholder="ваше имя">
                                <input type="text" name="review_email" placeholder="ваш email">
                                <textarea name="review_text"></textarea>
                                <input class="btn" type="submit" value="отправить">
                            </form>
                    </div>
            </div>
        </div>
    
</div>


<?php include ("tmp/footer.php");?>