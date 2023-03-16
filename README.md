# Laravel 10 透過 Vonage 簡短訊息服務進行手機號碼認證

透過 Vonage 簡短訊息服務應用程式介面（API）發送的一次性認證碼，作為註冊帳號時的手機認證機制。

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
> 可能會導致收不到簡訊驗證碼的情況有以下幾種，建議您嘗試以下方法：
> （1）請您再次確認於手機號碼欄位所選擇的國碼及輸入的手機號碼是否正確。
> （2）訊號不佳或者網路壅塞皆會導致無法收取驗證碼，建議可至訊號通順良好的地方再次獲取驗證碼，或者稍後重新獲取即可。
> （3）請確認是否有設定來電攔截 APP（e.g. Whoscall），如果有設定到黑名單，由於驗證簡訊通常為系統大量發送訊息，很可能被手機判為廣告，請解除攔截或封鎖，避免簡訊接收失敗。
> （4）確認手機是否開啟「手機勿擾模式」，導致簡訊接收失敗，如有設勿擾模式，請自行調整手機設定。
> （5）若您使用 iOS 手機，訊息裡的設定請不要使用第三方程式來封鎖/過濾黑名單聯絡人，避免簡訊接收失敗。
> （6）部分電信業者有提供的拒收企業簡訊功能，該功能可能導致無法正常接受驗證碼簡訊。解除流程可能因業者系統升級而有所不同，請見電信業者官網為主，若需查詢、關閉此功能請自行洽詢所屬電信商。
> 除了上述情況外，若仍無法收受簡訊驗證碼，建議您可依以下方式進行手機操作排除以下狀況：
> （1）確認手機儲存空間，若儲存空間已滿將無法收受簡訊驗證碼。
> （2）更新收受簡訊的 APP 至最新版本。
> （3）清除簡訊 APP 的 Cache（清除緩存）。
> （4）開啟並關閉飛航模式，重啟行動訊號環境。
> （5）將手機重啟。
> `（6）若上述仍無法排除，請您更換手機或門號進行驗證。`

----

## 畫面截圖
![](https://i.imgur.com/PnFCyHN.png)
> 輸入您的手機號碼

![](https://i.imgur.com/n7lR6S7.png)
> 確認有接收到簡訊（SMS），驗證碼一律為 6 位數

![](https://i.imgur.com/Zjpy7KA.png)
> 輸入手機簡訊收到的一次性認證碼進行認證，確認輸入的電話號碼正確無誤方能完成註冊