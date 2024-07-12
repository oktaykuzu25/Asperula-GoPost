document.addEventListener("DOMContentLoaded", function() {
    var perdayButton = document.getElementById('perdayButton');
    var endofdayButton = document.getElementById('endofdayButton');

    // "Gün Sonu Yap" butonunu başlangıçta devre dışı bırak
    endofdayButton.disabled = true;

    perdayButton.addEventListener("click", function(event) {
        // Butona tıklanma sonrası devre dışı bırakma
        perdayButton.disabled = true;
        perdayButton.textContent = "Gün Başladı..."; // Opsiyonel: Buton metnini değiştirme

        // Formu göndermek için AJAX kullanarak veri gönderimi
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "app-day-transactions.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Sunucudan gelen yanıtı kontrol etmek için konsola yazdırabilirsiniz
                alert("Gün başı işlemi başarıyla başlatıldı.İyi Kazançlar Dileriz.Oktay Kuzu ve Buğra Batuhan Başar.");
                
                // "Gün Sonu Yap" butonunu aktif et
                endofdayButton.disabled = false;

                // localStorage kullanarak durumu sakla
                localStorage.setItem('perdaySubmitted', 'true');
            } else {
                alert("Bir hata oluştu: " + xhr.statusText);
            }
        };
        xhr.onerror = function() {
            alert("İşlem sırasında bir hata oluştu.");
        };
        xhr.send("perday=true"); // POST verilerini gönder

        // Formun gönderilmesini engelleme
        event.preventDefault();
    });

    // "Gün Sonu Yap" butonuna tıklandığında
    endofdayButton.addEventListener("click", function(event) {
        // localStorage'daki bilgileri sıfırla
        localStorage.removeItem('perdaySubmitted');

        // "Gün Başı Yap" butonunu etkin hale getir
        perdayButton.disabled = false;
        perdayButton.textContent = "Gün Başı Yap"; // Buton metnini geri getirme
    });

    // Sayfa yenilendiğinde veya başka işlemler yapıldığında kontrolü sağla
    var perdaySubmitted = localStorage.getItem('perdaySubmitted');
    if (perdaySubmitted) {
        perdayButton.disabled = true;
        perdayButton.textContent = "Gün başladı..."; // Opsiyonel: Buton metnini değiştirme
        endofdayButton.disabled = false; // "Gün Sonu Yap" butonunu aktif et
    }
    endofdayButton.addEventListener("click", function(event) {
        if (confirm("Gün sonu işlemi yapmak istediğinize emin misiniz?")) {
            localStorage.removeItem('perdaySubmitted');

            perdayButton.disabled = false;
            perdayButton.textContent = "Gün Başı Yap";
        }
    });
});
