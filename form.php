<?php
$countries = [
    'Азербайджан',
    'Армения',
    'Белорусь',
    'Казахстан',
    'Киргизия',
    'Молдова',
    'Россия',
    'Таджикистан',
    'Туркменистан',
    'Узбекистан',
    'Украина',
    'Другое'
]; ?>
<div class="overlay" style="display: none"></div>
<section class="call-back-form ml-auto mr-auto" style="display: none">
    <div class="row">
        <h6 class="call-back-form__title col-12 mb-3 text-center">
            Make joby a part of your business. Let its virtues work for you.
        </h6>
        <p class="call-back-form__subtitle col-12 mb-2 text-center">
            Contact us get the partnership provision:
        </p>
        <form class="call-back-form__form form row g-3 needs-validation" action="" method="post" novalidate>
            <input type="hidden" name="project_name" value="SiteName">
            <input type="hidden" name="form_subject" value="Call back form">
            <p class="col-sm-6 req-item">
                <label class="visually-hidden" for="form-name">
                    Name:
                </label>
                <input id="form-name" class="form-control" type="text" name="name" placeholder="Name" required>
            </p>
            <p class="col-sm-6 req-item">
                <label class="visually-hidden" for="form-email">
                    Email:
                </label>
                <input id="form-email" class="form-control" type="email" name="email" placeholder="E-mail" required>
            </p>
            <p class="col-sm-6 req-item">
                <label class="visually-hidden" for="form-choose-country">
                    Choose country:
                </label>
                <select id="form-choose-country" class="form-select" name="country" required>
                    <option value>Choose country</option>
                  <?php
                  foreach ($countries as $country) : ?>
                      <option value="<?=$country?>"><?=$country?></option>
                  <?php endforeach;?>
                </select>
            </p>
            <p class="col-sm-6 req-item">
                <label class="visually-hidden" for="form-phone">
                    Phone:
                </label>
                <input id="form-phone" class="form-control" type="tel" name="phone" placeholder="Phone" required>
            </p>
            <p class="col-sm-6">
                <label class="visually-hidden" for="form-company">
                    Company:
                </label>
                <input id="form-company" class="form-control" type="text" name="company" placeholder="Company">
            </p>
            <p class="col-sm-6">
                <label class="visually-hidden" for="form-site">
                    Site:
                </label>
                <input id="form-phone" class="form-control" type="url" name="site" placeholder="Site" >
            </p>
            <p class="col-12">
                <label class="visually-hidden" for="form-msg">
                    Massage:
                </label>
                <textarea id="form-msg" class="form-control" name="msg" placeholder="Type your massage" rows="6"></textarea>
            </p>
            <p class="form__notes">
                *-Required fields
            </p>
            <p class="col-12 text-center">
                <button class="form__btn w-40 btn btn-primary btn-lg ml-3 mr-auto" type="submit">
                    Send
                </button>
            </p>
        </form>
    </div>
    <!-- /.row -->
</section>
<!-- /.call-back-form -->