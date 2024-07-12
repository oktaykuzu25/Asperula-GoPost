<?php include("../../../php/login-register.php") ?>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <title> ASPERULA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="TechAuth - Authentication Pages Tailwind CSS 3 HTML Template, It’s fully responsive and built Tailwind v3" name="description" />
    <meta content="Techzaa" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <section class="h-screen flex items-center justify-center bg-no-repeat inset-0 bg-cover bg-[url('../images/bg.png')]">
        <div class="container 2xl:px-80 xl:px-52">
            <div class="bg-white rounded-lg p-5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                <div class="grid xl:grid-cols-5 lg:grid-cols-3 gap-6">

                    <div class="xl:col-span-2 lg:col-span-1 hidden lg:block">
                        <div class="bg-sky-600 text-white rounded-lg flex flex-col justify-between gap-10 h-full w-full p-7">

                            <span class="font-semibold tracking-widest uppercase">ASPERULA </span>
                            <div>
                                <h1 class="text-2xl/tight mb-3">İnce Detaylarda Kalite, Asperula'nın İşleyişindeki Zarafet.</h1>
                                <br>
                                <p class="text-gray-200 font-normal leading-relaxed">Kahve Keyfindeki Mükemmeliyet, Asperula'da Hizmetin İnceliği.</p>
                            </div>

                            <div>
                                <div class="bg-sky-700/50 rounded-lg p-5">
                                    <p class="text-gray-200 text-sm font-normal leading mb-4">Zevkli Mola Anlarınıza Eşlik Eden İncelik: Asperula'da Hizmette Fark Yaratan Detaylar</p>
                                    <div class="flex items-center gap-4">

                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                    <div class="xl:col-span-3 lg:col-span-2 lg:mx-10 my-auto">
                        <div>
                            <h1 class="text-2xl/tight mb-3">Personel Kaydet</h1>
                            <p class="text-sm font-medium leading-relaxed">Asperula'da, verimli hizmet için personel kaydını titizlikle tutuyoruz.</p>
                        </div>

                        <div class="space-y-5 mt-10">
                            <form action="singuperso.php" method="POST">
                                <div>
                                    <label class="font-medium text-sm block mb-2" for="email">Kullanıcı Adı</label>
                                    <input class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full" type="text" id="email" name="kullanıcıad" placeholder="Kullanıcı adınızı giriniz.">
                                </div>
                                <br>
                                <div>
                                    <div>
                                        <label class="font-medium text-sm block mb-2" for="pwd">Şifre </label>
                                        <input class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full" type="password" id="pwd" name="pwd" placeholder="Şifre tekrar giriniz.">
                                    </div>

                                </div>
                                <br>
                                <div>
                                    <label class="font-medium text-sm block mb-2" for="pwd">Şifre Tekrar</label>
                                    <input class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full" type="password" id="pwd" name="pwdtekrar" placeholder="Şifre tekrar giriniz.">
                                </div>
                                <br>
                                <div>
                                    <label class="font-medium text-sm block mb-2" for="pwd">Yetkiler</label>
                                    <select name="yetki" class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full">
                                        <option value="">Seçiniz</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Personel</option>
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label class="font-medium text-sm block mb-2" for="pwd">Şirketler</label>
                                    <select name="sirket" class="text-gray-500 border-gray-300 focus:ring-0 focus:border-gray-400 text-sm rounded-lg py-2.5 px-4 w-full">
                                        <option value="">Seçiniz</option>
                                        <?php
                                        if (is_array($fetchDataBusiness)) {
                                            $sn = 1;
                                            foreach ($fetchDataBusiness as $data) {
                                        ?>
                                                <option value="<?php echo $data['business_id'] ?>"><?php echo $data['business_name'] ?></option>
                                        <?php
                                                $sn++;
                                            }
                                        } else {
                                            echo $fetchDataBusiness;
                                        } ?>
                                    </select>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-6 mt-8">
                                    <button name="singupersobtn" class="bg-sky-600 text-white text-sm rounded-lg px-6 py-2.5">Kayıt/Ol</button>
                                    <p class="text-sm text-gray-500">Hesabınız var ise ? <a href="signin.php" class="ms-2 underline text-sky-600"> Giriş/Yap</a></p>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>