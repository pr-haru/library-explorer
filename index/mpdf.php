<?php
ini_set('memory_limit', '512M');
require_once  '../vendor/autoload.php'; 


// HTMLファイルのパス
$htmlFilePath = '../view/index.html'; 

// ファイルの内容を読み込む
$htmlContent = file_get_contents($htmlFilePath);
$stylesheet = file_get_contents('../css/test.css');

// mPDFオブジェクトを作成
$mpdf = new \Mpdf\Mpdf();

// HTMLコンテンツをmPDFに書き込む
// CSS が UTF-8 でない場合は変換しておく
$stylesheet = mb_convert_encoding($stylesheet, "UTF-8");
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($htmlContent);

// PDFとして出力（ブラウザで表示・ダウンロード）
$mpdf->Output('download.pdf', 'D'); // 'D'はダウンロードを意味します
// $html = 'Invoice....htmlコード';

// $mpdf=new \Mpdf\Mpdf(); 
// $mpdf->WriteHTML($html);
// $mpdf->Output();