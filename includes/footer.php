<footer class="bg-second">
        <div class="container">
            <div class="row">
                <div class="col-5 col-md-6 ">
                    <h3 class="footer-head">Đồ Án Web Chuyên Ngành KTPM</h3>
                    <ul class="menu">
                        <li><a href="#">Sinh viên thực hiện: Đỗ Văn Hoàng - Trần Trung Kiên - Đỗ Minh Đăng</a></li>
                        <li><a href="#">Lớp: 21050281</a></li>
                        <li><a href="#">MSV: 52100798-52100810-52100749</a></li>
                        <li><a href="#">Đồ án được thực hiện tại Đại học Tôn Đức Thắng - Cơ sở Bảo Lộc</a></li>
                    </ul>
                </div>

                <div class="col-5 col-md-6">
                    <h3 class="footer-head">Đại học Tôn Đức Thắng</h3>
                    <ul class="menu">
                        <li><a href="#"> Điện thoại: 0995648515</a></li>
                        <li><a href="#">Email: dominhdang1405@gmail.com</a></li>
                        <li><a href="#">Địa chỉ: 171, quận 1, TP Vũng Tàu, Bà Rịa - Vũng Tàu</a></li>
                    </ul>
                </div>
                <div class="col-2 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3 class="contact-header">
                            DARKDO
                        </h3>
                        <ul class="contact-socials">
                            <li><a href="https://www.facebook.com/profile.php?id=100054985676377">
                                    <i class='bx bxl-facebook-circle'></i>
                                </a></li>
                            <li><a href="https://www.instagram.com">
                                    <i class='bx bxl-instagram-alt'></i>
                                </a></li>
                            <li><a href="https://www.youtube.com/">
                                    <i class='bx bxl-youtube'></i>
                                </a></li>
                            <li><a href="https://www.twitter.com/">
                                    <i class='bx bxl-twitter'></i>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- app js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
  <?php if(isset($_SESSION['message']))
  {
  ?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?= $_SESSION['message'] ?>');
  <?php 
    unset($_SESSION['message']);
  }
  ?>
</script>
