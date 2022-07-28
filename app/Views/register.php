<?= $this->extend('layout2'); ?>
<!--::header part start::-->
<?= $this->section('content'); ?>
<!-- sign in end-->
<section class="banner_part">
    <div class="sign_in container">
        <div class="sign_in row justify-content-center">
            <div class="inhere">
                <div class="col-12">
                    <div class="d-flex justify-content-center h-100">
                        <div class="card">
                            <div class="card-header">
                                <h3>Sign up</h3>
                                <!-- <div class="d-flex justify-content-end social_icon">
                                    <span><i class="fab fa-google-plus-square"></i></span>
                                </div> -->
                            </div>

                            <!-- define per form -->
                            <?php
                            $username = [
                                'name' => 'username',
                                'id' => 'username',
                                'value' => null,
                                'class' => 'form-control',
                                'placeholder' => 'username'
                            ];

                            $email = [
                                'name' => 'email',
                                'id' => 'email',
                                'value' => null,
                                'class' => 'form-control',
                                'placeholder' => 'email'
                            ];

                            $password = [
                                'name' => 'password',
                                'id' => 'password',
                                'class' => 'form-control',
                                'placeholder' => 'password'
                            ];

                            $repeatPassword = [
                                'name' => 'repeatPassword',
                                'id' => 'repeatPassword',
                                'class' => 'form-control',
                                'placeholder' => 'repeat password'
                            ];

                            $session = session();
                            $errors = $session->getFlashdata('errors');
                            ?>

                            <!-- jika ada error -->
                            <?php if ($errors != null) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Terjadi Kesalahan</h4>
                                    <hr>
                                    <p class="mb-0">
                                        <?php
                                        foreach ($errors as $err) {
                                            echo $err . '<br>';
                                        }
                                        ?>
                                    </p>
                                </div>
                            <?php endif ?>

                            <!-- memulai form register by helper codeigniter -->

                            <?= form_open('Auth/register') ?>
                            <div class="card-body">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Username", "username") ?>
                                    </div>
                                    <?= form_input($username) ?>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Email", "email") ?>
                                    </div>
                                    <?= form_input($email) ?>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Password", "password") ?>
                                    </div>
                                    <?= form_password($password) ?>
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <div class="d-none">
                                        <?= form_label("Repeat Password", "repeatPassword") ?>
                                    </div>
                                    <?= form_password($repeatPassword) ?>
                                </div>
                                <div class="text-right form-group ">
                                    <?= form_submit('submit', 'Submit', ['class' => 'btn btn-warning btn-block mt-3']) ?>
                                </div>
                                <?= form_close('') ?>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center links">
                                    <p class='text-light'>Already Registered? <a href="<?= site_url('auth/login') ?>">Sign in</a></p>
                                </div>
                                <div class="d-flex justify-content-center links mb-3">
                                    Back to<a href="<?= site_url('home/index')  ?>">Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>