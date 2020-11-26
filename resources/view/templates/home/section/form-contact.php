<?php require_once __DIR__ . '/../../../includes/header.php'; ?>

<div class="container d-flex justify-content-center mt-5">

    <div class="card">

        <div class="card-header header-contact">
            <h4 class="text-center m-3" style="font-size: 25px">Contact</h4>
            <a href="/home" class="d-flex justify-content-end anchor-social-media">Home</a>
        </div>

        <div class="card-body bg-light">

            <form method="post" action="/controller-contact">

                <?php require_once __DIR__ . '/../../../includes/alert.php'; ?>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control input-contact" type="text" name="name" placeholder="Your name" required/>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                    </div>
                    <input class="form-control input-contact" type="email" name="email" placeholder="Your email" required/>
                </div>

                <div class="form-group">
                    <label> <textarea class="form-control input-contact" rows="8" cols="70" placeholder="Your message" name="text" required></textarea></label>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-contact w-50">Send</button>
                </div>

            </form>

        </div>

        <div class="card-footer header-contact">
            <ul class="d-flex justify-content-center mt-3">
                <li class="mr-2">
                    <a class="anchor-social-media" href="https://github.com/brunof19d" target="_blank"><i
                                class="fab fa-github icon-footer"></i>Github</a>
                </li>
                <li class="ml-2">
                    <a class="anchor-social-media" href="#"><i class="fab fa-linkedin icon-footer"></i>Linkedin</a>
                </li>
            </ul>
        </div>

    </div>

</div>

<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>






