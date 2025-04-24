# Laravel 12 透過 Vonage 簡短訊息服務進行手機號碼認證

透過 Vonage 簡短訊息服務應用程式介面發送的一次性認證碼，作為註冊帳號時的手機認證機制。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 執行安裝 Vite 和 Laravel 擴充套件引用的依賴項目。
```sh
$ npm install
```
- 執行正式環境版本化資源管道並編譯。
```sh
$ npm run build
```
- 在瀏覽器中輸入已定義的路由 URL 來，例如：http://127.0.0.1:8000。
- 你可以經由 `/register` 來進行註冊。

----

## 畫面截圖
![](https://i.imgur.com/zh1r1o5.png)
> 輸入您的手機號碼

![](https://i.imgur.com/v76S8eI.png)
> 確認有接收到簡訊（SMS），驗證碼一律為 6 位數

![](https://i.imgur.com/yGg21tr.png)
> 輸入手機簡訊收到的一次性認證碼進行認證，確認輸入的電話號碼正確無誤方能完成註冊
