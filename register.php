<?php 
include("./includes/header.php");
?>
<script src="../assets/js/boostrap.bundle.js"></script>

<div class="py-5">
    <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">
                  <h1 style="color:white ; ">Đăng ký</h1>
                </div>
                <div class="card-body">
                    <form action="./functions/authcode.php" method="POST" id="register-account">
                        <div class="mb-3">
                            <b><label class="form-label">Họ tên</label></b>
                            <input type="text" required name ="name" class="form-control" placeholder="Nhập họ tên của bạn" >
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputEmail1" class="form-label">Email</label></b>
                            <input type="email" required name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"  placeholder="Nhập Email của bạn">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputEmail1" class="form-label">SĐT</label></b>
                            <input type="number" required name="phone" class="form-control"  placeholder="Nhập số điện thoại của bạn">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputPassword1" class="form-label">Mật khẩu</label></b>
                            <input type="password" required name="password" id="InputPassword1" class="form-control"  placeholder="Nhập mật khẩu">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label></b>
                            <input type="password" required name="cpassword" id="InputPassword2" class="form-control"  placeholder="Xác nhận mật khẩu">
                        </div>
                        <!-- Đăng kí -->
                        <input type="hidden" name="register-btn" value="check">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </form>
                </div>

            </div>
         </div>
     </div>
    </div> 
</div>

<script>
    const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };
    document.getElementById("register-account").addEventListener('submit',function(e){
        let email = document.getElementById("InputEmail").value;
        let password1 = document.getElementById("InputPassword1").value;
        let password2 = document.getElementById("InputPassword2").value;
        if(!validateEmail(email)){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Lỗi email không hợp lệ');
            e.preventDefault();
        }else if(password1 != password2){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Mật khẩu chưa khớp');
            e.preventDefault();
        }else if(password1.length <= 6){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Vui lòng nhập mật khẩu nhiều hơn 6 kí tự');
            e.preventDefault();
        }
    })
</script>
<?php include("./includes/footer.php")?>