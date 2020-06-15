<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form ActiveForm */
?>
<div class="col-lg-6 col-md-6">
    <!-- billing-details-wrap start -->
    <div class="billing-details-wrap">
        <form action="#">
            <h3 class="shoping-checkboxt-title">Оформить заказ</h3>

            <div class="row">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'full_name') ?>
                <?= $form->field($model, 'address')->textarea() ?>
                <?= $form->field($model, 'number')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                ]) ?>
                <?= $form->field($model, 'e_mail') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <!--<div class="row">
                <div class="col-lg-6">
                    <p class="single-form-row">
                        <label>First name <span class="required">*</span></label>
                        <input type="text" name="First name">
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="single-form-row">
                        <label>Username or email <span class="required">*</span></label>
                        <input type="text" name="Last name">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Company name</label>
                        <input type="text" name="email">
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="single-form-row">
                        <label>Country <span class="required">*</span></label>
                        <div class="nice-select wide">
                            <select>
                                <option>Select Country...</option>
                                <option>Albania</option>
                                <option>Angola</option>
                                <option>Argentina</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>Bangladesh</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Street address <span class="required">*</span></label>
                        <input type="text" placeholder="House number and street name" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Town / City <span class="required">*</span></label>
                        <input type="text" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>State / County</label>
                        <input type="text" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Postcode / ZIP <span class="required">*</span></label>
                        <input type="text" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Phone</label>
                        <input type="text" name="address">
                    </p>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row">
                        <label>Email address <span class="required">*</span></label>
                        <input type="text" name="Email address ">
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="checkout-box-wrap">
                        <label><input type="checkbox" id="chekout-box"> Create an account?</label>
                        <div class="account-create single-form-row">
                            <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                            <label class="creat-pass">Create account password <span>*</span></label>
                            <input type="password" class="input-text">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="checkout-box-wrap">
                        <label id="chekout-box-2"><input type="checkbox"> Ship to a different address?</label>
                        <div class="ship-box-info">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" name="First name">
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="single-form-row">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text" name="Last name ">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Company name</label>
                                        <input type="text" name="email">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single-form-row">
                                        <label>Country <span class="required">*</span></label>
                                        <div class="nice-select wide">
                                            <select>
                                                <option>Select Country...</option>
                                                <option>Albania</option>
                                                <option>Angola</option>
                                                <option>Argentina</option>
                                                <option>Austria</option>
                                                <option>Azerbaijan</option>
                                                <option>Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Street address <span class="required">*</span></label>
                                        <input type="text" placeholder="House number and street name" name="address">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="address">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>State / County</label>
                                        <input type="text" name="address">
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Postcode / ZIP <span class="required">*</span></label>
                                        <input type="text" name="address">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="single-form-row m-0">
                        <label>Order notes</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>
                    </p>
                </div>
            </div>-->
        </form>
    </div>
    <!-- billing-details-wrap end -->
</div>

<div class="col-lg-6 col-md-6">
    <!-- your-order-wrapper start -->
    <div class="your-order-wrapper">
        <h3 class="shoping-checkboxt-title">Ваш заказ</h3>
        <!-- your-order-wrap start-->
        <div class="your-order-wrap">
            <!-- your-order-table start -->
            <div class="your-order-table table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th class="product-name">Товары</th>
                        <th class="product-total">Стоимость</th>
                    </tr>
                    </thead>

                    <!--Список товаров-->
                    <tbody>
                    <tr class="cart_item">
                        <td class="product-name">
                            Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
                        </td>
                        <td class="product-total">
                            <span class="amount">£165.00</span>
                        </td>
                    </tr>
                    </tbody>

                    <!--Подсчёт итого с доставкой-->
                    <tfoot>
                    <tr class="cart-subtotal">
                        <th>Cart Subtotal</th>
                        <td><span class="amount">£215.00</span></td>
                    </tr>
                    <tr class="shipping">
                        <th>Shipping</th>
                        <td>
                            <ul>
                                <li>
                                    <input type="radio">
                                    <label>
                                        Flat Rate: <span class="amount">£7.00</span>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio">
                                    <label>Free Shipping:</label>
                                </li>
                                <li></li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="order-total">
                        <th>Order Total</th>
                        <td><strong><span class="amount">£215.00</span></strong>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- your-order-table end -->

            <!-- your-order-wrap end -->
            <div class="payment-method">
                <div class="order-button-payment">
                    <input type="submit" value="Place order">
                </div>
            </div>
            <!-- your-order-wrapper start -->

        </div>
    </div>
</div>


