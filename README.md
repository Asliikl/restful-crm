# TASK API

**Amaç** :
Bu proje, çalışan ve görev yönetim sistemi geliştirmeyi amaçlamaktadır. Sistem, aşağıdaki işlevleri sağlar:

- Çalışan bilgilerini oluşturma, görüntüleme, güncelleme ve silme  
- Çalışanlara görev atama  
- Görevleri listeleme, güncelleme ve silme  
- Görevleri tamamlandı olarak işaretleme  
- Çalışan bazlı görev listesini görüntüleme  


**Endpointler ve açıklamaları**

1) **Yeni Çalışan Oluşturma**  
**POST** /api/employees  
**URL:** http://127.0.0.1:8000/api/employees  
**Headers:**  
Accept: application/json  
Content-Type: application/json  
**Body (JSON):**  
{  
  "name": "Aslıhan İkiel",  
  "email": "aslihan@gmail.com"  
}  
**Açıklama:** Yeni çalışan oluşturur. name ve email zorunludur.

---

2) **Çalışan Detayı Getirme**  
**GET** /api/employees/{id}  
**URL:** http://127.0.0.1:8000/api/employees/1  
**Headers:**   Accept: application/json  

**Açıklama:** Belirtilen id’ye sahip çalışanın detaylarını getirir.

---

3) **Çalışan Güncelleme**  
**PUT** /api/employees/{id}  
**URL:** http://127.0.0.1:8000/api/employees/1  
**Headers:**  
Accept: application/json  
Content-Type: application/json  
**Body (JSON):**  
{  
  "name": "Aslıhan İkiel Güncel",  
  "email": "aslihan.guncel@example.com"  
}  
**Açıklama:** Çalışanın bilgilerini günceller.

---

4) **Çalışan Silme**  
**DELETE** /api/employees/{id}  
**URL:** http://127.0.0.1:8000/api/employees/1  
**Headers:**  -> Accept: application/json  
**Açıklama:** Belirtilen çalışanı sistemden siler.

---

5) **Çalışanın Görevlerini Listeleme**  
**GET** /api/employees/{id}/tasks  
**URL:** http://127.0.0.1:8000/api/employees/1/tasks  
**Headers:**  -> Accept: application/json  
**Açıklama:** İlgili çalışana ait görevlerin listesini döner.

---

6) **Görevleri Listeleme**  
**GET** /api/tasks  
**URL:** http://127.0.0.1:8000/api/tasks  
**Headers:**  -> Accept: application/json  
**Açıklama:** Sistemdeki tüm görevleri listeler.

---

7) **Yeni Görev Ekleme**  
**POST** /api/tasks  
**URL:** http://127.0.0.1:8000/api/tasks  
**Headers:**  
Accept: application/json  
Content-Type: application/json  
**Body (JSON):**  
{  
  "employee_id": 1,  
  "title": "Yeni Görev Başlığı",  
  "status": "pending"  
}  
**Açıklama:** Yeni görev oluşturur.

---

8) **Görev Detaylarını Getirme**  
**GET** /api/tasks/{id}  
**URL:** http://127.0.0.1:8000/api/tasks/5  
**Headers:**  -> Accept: application/json  
**Açıklama:** Belirtilen id’ye ait görev bilgilerini getirir.

---

9) **Görev Güncelleme**  
**PUT** /api/tasks/{id}  
**URL:** http://127.0.0.1:8000/api/tasks/5  
**Headers:**  
Accept: application/json  
Content-Type: application/json  
**Body (JSON):**  
{  
  "title": "Görev Başlığı Güncellendi",  
  "status": "in_progress"  
}  
**Açıklama:** Görevdeki bilgileri günceller.

---

10) **Görev Silme**  
**DELETE** /api/tasks/{id}  
**URL:** http://127.0.0.1:8000/api/tasks/5  
**Headers:**  -> Accept: application/json  
**Açıklama:** Belirtilen görevi siler.

---

11) **Görev Tamamlama**  
**PATCH** /api/tasks/{id}/complete  
**URL:** http://127.0.0.1:8000/api/tasks/5/complete  
**Headers:** -> Accept: application/json  
**Açıklama:** Görev durumunu completed olarak günceller.

---

12) **Genel Notlar**  
- Tüm isteklerde mutlaka `Accept: application/json` header'ını ekleyin.  
- POST, PUT, PATCH isteklerinde ayrıca `Content-Type: application/json` header'ını kullanın.  

- Postman'da X-CSRF-TOKEN header’ını ekleyin.
---

**Örnek Postman Header'ları**  
| Header Name   | Value                | Notlar             |
|---------------|----------------------|--------------------|
| Accept        | application/json     |- |
| Content-Type  | application/json     |- |
| X-CSRF-TOKEN  |      'Token'         | POST,PUT, PATCH isteklerinde |

