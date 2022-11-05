<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- 言語・環境設定 -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- ページの内容 -->
    <title>SuperChat Generator</title>
    <meta name="description" content="YouTubeのスーパチャットを再現できるジェネレーター">

    <!-- サイトアイコン -->
    <link rel="icon" href="images/icon.png" sizes="16x16" type="image/png"> <!-- 通常用 -->

    <!-- OGPタグ用 -->
    <meta property="og:url" content="https://scg.pocopota.com/" />
    <meta property="og:title" content="SuperChat Generator" />
    <meta property="og:type" content="website">
    <meta property="og:description" content="YouTubeのスーパチャットを再現できるジェネレーター">
    <meta property="og:image" content="https://scg.pocopota.com/images/ogp.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@PocoPota_io" />
    <meta property="og:site_name" content="SuperChat Generator" />
    <meta property="og:locale" content="ja_JP" />

    <!-- 読み込み -->
    <link rel="stylesheet" href="css/style.min.css">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZSSKEGYSKW"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-ZSSKEGYSKW');
    </script>
</head>

<body>
    <main>
        <section id="section-top">
            <h1>SuperChat Generator</h1>
        </section>
        <section id="section-bottom">
            <div id="form">
                <div>
                    <label>ユーザー名</label>
                    <input type="text" id="usernameInput" placeholder="ユーザー名を入力">
                </div>
                <div>
                    <label>アイコン画像</label>
                    <!-- <select id="img-sel">
                        <option value="url">画像URLを指定</option>
                        <option value="upload">画像をアップロード</option>
                    </select>
                    <input type="url" id="url-way" placeholder="画像URLを入力"> -->
                    <input type="file" id="file-way" accept="image/*">
                </div>
                <div>
                    <label>金額</label>
                    <input type="number" id="moneyInput" placeholder="金額を入力">
                </div>
                <div>
                    <label>コメント</label>
                    <textarea id="textInput" placeholder="コメントを入力"></textarea>
                </div>
            </div>
            <?php
                if(isset($_GET['name']) || isset($_GET['icon']) || isset($_GET['money']) || isset($_GET['text'])){
                    $name = $_GET['name'];
                    $icon = $_GET['icon'];
                    $money = (int)$_GET['money'];
                    if($money <= 199){
                        //青
                        $top = '#1565C0';
                        $bottom = '#1565C0';
                        $nameFont = '#ffffffb3';
                        $moneyFont = '#ffffff';
                        $textFont = '#ffffff';
                    }else if($money <= 499){
                        //水色
                        $top = '#00B8D4';
                        $bottom = '#00E5FF';
                        $nameFont = '#000000b3';
                        $moneyFont = '#000000';
                        $textFont = '#000000';
                    }else if($money <= 999){
                        //緑
                        $top = '#00BFA5';
                        $bottom = '#1DE9B6';
                        $nameFont = '#000000b3';
                        $moneyFont = '#000000';
                        $textFont = '#000000';
                    }else if($money <= 1999){
                        //黄色
                        $top = '#FFB300';
                        $bottom = '#FFCA28';
                        $nameFont = '#000000b3';
                        $moneyFont = '#000000';
                        $textFont = '#000000';
                    }else if($money <= 4999){
                        //オレンジ
                        $top = '#E65100';
                        $bottom = '#F57C00';
                        $nameFont = '#ffffffb3';
                        $moneyFont = '#ffffff';
                        $textFont = '#ffffff';
                    }else if($money <= 9999){
                        //マゼンタ
                        $top = '#C2185B';
                        $bottom = '#E91E63';
                        $nameFont = '#ffffffb3';
                        $moneyFont = '#ffffff';
                        $textFont = '#ffffff';
                    }else{
                        //赤
                        $top = '#D00000';
                        $bottom = '#E62117';
                        $nameFont = '#ffffffb3';
                        $moneyFont = '#ffffff';
                        $textFont = '#ffffff';
                    }
                    $text = $_GET['text'];
                    $state = true;
                }else{
                    $state = false;
                }
            ?>
            <div id="preview">
                <div id="superchat">
                    <div id="superchat-top" style="<?php if($state == true){echo "background:".$top.";";} ?>">
                        <div id="superchat-top-left">
                            <div id="icon">
                                <img src="<?php if($state == true){echo $icon;}else{echo "images/icon.png";}?>">
                            </div>
                        </div>
                        <div id="superchat-top-right">
                            <div id="name" style="<?php if($state == true){echo "color:".$nameFont.";";}?>">
                                <?php if($state == true){echo $name;}else{echo "SuperChat Generator";}?>
                            </div>
                            <div id="money"  style="<?php if($state == true){echo "color:".$moneyFont.";";} ?>">
                                <?php if($state == true){echo "￥" . $money;}else{echo "￥10,000";}?>
                            </div>
                        </div>
                    </div>
                    <div id="superchat-bottom" style="<?php if($state == true){echo "background:".$bottom.";";} ?>">
                        <div id="text" style="<?php if($state == true){echo "color:".$textFont.";";} ?>">
                            <?php if($state == true){echo $text;}else{echo "すーぱーちゃーーーーーーっと！";}?>
                        </div>
                    </div>
                </div>
                <input type="button" id="download-btn" value="ダウンロード">
            </div>
        </section>
    </main>
    <script src="script/script.js"></script>
</body>

</html>