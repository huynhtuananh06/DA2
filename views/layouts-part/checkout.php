<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/DA2/public/asset/css/checkOut.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <div class="checkout">
        <form action="index.php?controller=checkout&action=addCheckOut" method="POST"
            enctype="application/x-www-form-urlencoded">
            <div class="img-container" style="align-content: center;">
                <p style="text-align: center; margin: 10px 0">số lượng người lớn: <?= $check['booking']['numAdutls'] ?>
                </p>
                <p style="text-align: center; margin: 10px 0">số lượng trẻ em: <?= $check['booking']['numChildren'] ?>
                </p>
                <p style="text-align: center; margin: 10px 0">Tổng tiền: <?= $check['booking']['totalPrice'] ?></p>
                <p style="text-align: center; margin: 10px 0">người đặt: <?= $_SESSION['user']['fullName'] ?></p>
            </div>
            <div class="method-right">
                <div class="img-method">
                    <img src="/DA2/public/asset/img/10.png" alt="" />
                    <img src="/DA2/public/asset/img/10.png" alt="" />
                </div>
                <div class="method">

                    <input type="hidden" name="bookingID" value="<?= htmlspecialchars($check['bookingID']) ?>">
                    <input type="hidden" name="total" value="<?= htmlspecialchars($check['amount']) ?>">
                    <div class="inbut row">
                        <input type="submit" name="method" value="tiền mặt" class="btn btn-danger" style="width: 200px">

                    </div>

                    <div class="inbut row">
                        <input type="submit" name="method" value="Thanh Toán MOMO" class="btn btn-danger"
                            style="width: 200px">
                    </div>
                    <div class="inbut row">
                        <input type="submit" name="method" value="Thanh Toán MOMO-ATM" class="btn btn-danger"
                            style="width: 200px">
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>

</html>