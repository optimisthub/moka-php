## TCMB ClientIP & ClientPort zorunluluğu

TCMB düzenlemesi gereği `ClientIP` ve `ClientPort` alanları artık her ödeme isteğinde zorunludur.
`ClientPort` tüm entegrasyonlarda eksikti; `ClientIP` ise sipariş kaydından veya platformun
yardımcı metodundan alındığı için proxy ya da private adres gönderebiliyordu.

### ClientIP
- Canlı bağlantıdan okunur; CDN/proxy başlıkları desteklenir:
  `CF-Connecting-IP` -> `True-Client-IP` -> `X-Real-IP` -> `X-Forwarded-For` (zincirin ilk public adresi) -> `Client-IP` -> `REMOTE_ADDR`.
- `X-Forwarded-For` zinciri artık ayrıştırılıyor. Önceden tüm zincir tek değer gibi ele alındığı için **proxy'nin IP'si** gönderilebiliyordu.
- Moka'nın `ClientIpAddressIsRestricted` ile reddettiği private/reserved aralıklar ayıklanır:
  `10.x`, `172.16-31.x`, `192.168.x`, `127.0.0.1`, `169.254.x`, CGNAT ve IPv6 karşılıkları.
- Moka kılavuzunda **geçerli** sayılan `2001:db8::/32` kabul edilir — PHP bu aralığı "reserved" saysa da Moka aksini belirtiyor.
- Header'da adresle birlikte gelen port (`1.2.3.4:5678`) temizlenir.

### ClientPort
- Yeni alan. Sırasıyla `X-Forwarded-Port` -> `X-Real-Port` -> `X-Client-Port` -> `REMOTE_PORT` okunur.
- Yalnızca rakam ve **1-65535** aralığı kabul edilir.
- **Sabit veya rastgele değer gönderilmez.** Moka bu değerleri izleyip işlemleri durdurabiliyor.
- Proxy/LB arkasında port doğrudan okunamadığı için forwarded başlıkları önceliklidir.

### Proxy / CDN kullanıyorsanız

nginx kenar katmanına ekleyin:

```nginx
proxy_set_header X-Real-IP        $remote_addr;
proxy_set_header X-Forwarded-For  $proxy_add_x_forwarded_for;
proxy_set_header X-Forwarded-Port $remote_port;
```

Apache için `RemoteIPHeader X-Forwarded-For`. Cloudflare ve çoğu CDN bu başlıkları otomatik gönderir.

### Kurulum notu

Güncelleme sonrası ödeme alanında sorun yaşarsanız, sunucunuzun gerçek istemci IP ve portunu
uygulamaya ilettiğinden emin olun. Test için: bir sipariş oluşturup Moka yanıtındaki
`ClientIpAddress*` / `ClientIpAddressPort*` hata kodlarını kontrol edin.
