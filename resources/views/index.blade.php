<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>l_form</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        
            <div class="header">
                <h3>システムのご意見をお聞かせください。</h3>
            </div>
            <div class="content">
                <form action="">
                    <p>氏名<span style="color:red;">※</span></p>
                    <input type="text" placeholder="入力してください">
                    <p>性別<span style="color:red;">※</span></p> 
                    <input type="radio" name="sex" value="0" checked="checked" >男性
                    <input type="radio" name="sex" value="1"  >女性
                    <p>年代<span style="color:red;">※</span></p>
                    <select>
                        <option value="1">1</option>
                        <option value="1">1</option>
                        <option value="1">1</option>
                    </select>
                    <p>メールアドレス<span style="color:red;">※</span></p>
                    <input type="email" placeholder="入力してください">
                    <p>メール送信可否</p>
                    <p>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</p>
                    <input type="checkbox" checked="checked">送信を許可します
                    <p>ご意見</p>
                    <input type="textarea" placeholder="備考欄"><br><br>
                    <input type="submit" name="confirm" class="" value="確認" >
                </form>

               
            </div>
    
    </body>
</html>
