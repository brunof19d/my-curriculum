</div>

</div>
</body>

<footer class="container-fluid mt-3">

    <div class="row d-flex align-items-center">

        <div class="col-lg-4 mt-3">
            <p>&copy; Bruno Dadario, All Rights Reserved</p>
        </div>

        <div class="col-lg-4 mt-3">
            <p class="ml-5">Find me on</p>
            <ul class="d-flex justify-content-center">

                <li class="mr-2">
                    <a class="anchor-social-media" href="https://github.com/brunof19d" target="_blank"><i class="fab fa-github icon-footer"></i>Github</a>
                </li>
                <li class="ml-2">
                    <a class="anchor-social-media" href="#"><i class="fab fa-linkedin icon-footer"></i>Linkedin</a>
                </li>
            </ul>
        </div>

        <div class="col-lg-4 mt-3">
            <ul class="d-flex justify-content-center">
                <li class="mr-2"><a class="anchor-social-media" href="/about">About</a>
                    <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                    <a href="/form-about" class="btn btn-dark btn-sm">Edit</a>
                    <?php endif; ?>
                </li>
                <li class="ml-2">
                    <a class="anchor-social-media" href="/contact">Contact</a>
                    <?php if ($_SERVER['PATH_INFO'] == '/admin'): ?>
                        <a href="/form-contact" class="btn btn-dark btn-sm">Edit</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>

    </div>

</footer>

<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

</html>
