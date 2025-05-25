# beauty-hora
project voor backend web
# 💇‍♀️ Beauty Hora — Laravel 12 Webapp

**Beauty Hora** is een dynamische webapplicatie gebouwd met Laravel 12, als eindproject voor het vak **Backend Web**.

---

## 🌐 Projectbeschrijving

Beauty Hora is een professionele schoonheidssalon met boekingssysteem, nieuws, FAQ, gebruikersbeheer en meer. Zowel bezoekers als ingelogde gebruikers kunnen ermee werken. Admins hebben toegang tot contentbeheer en moderatiepanelen.

---

## ⚙️ Functionaliteiten

### 👤 Authenticatie

- Registreer / Login / Wachtwoord vergeten
- 'Remember me' functionaliteit
- Eén default admin account (zie onderaan)

### 👥 Gebruikersbeheer

- Publieke profielpagina voor elke gebruiker
- Gebruiker kan eigen gegevens bewerken (foto, bio, naam, verjaardag)
- Admins kunnen andere gebruikers admin maken of verwijderen

### 📰 Nieuwsitems

- Admins kunnen nieuws toevoegen, bewerken, verwijderen
- Publiek kan alle nieuws bekijken (lijst + detail)
- Inhoud: titel, afbeelding, content, publicatiedatum

### 💬 Commentaren

- Ingelogde gebruikers kunnen reageren op nieuwsitems
- Admins modereren reacties

### ❓ FAQ

- Bezoekers zien FAQ per categorie
- Admins kunnen vragen + categorieën beheren
- Bezoekers kunnen vragen voorstellen
- Admins keuren suggesties goed (of niet)

### 📅 Boeking systeem

- Auth-gebruikers kunnen een afspraak boeken
- Admin ziet alle boekingen in overzicht

### 📞 Contactformulier

- Bezoekers kunnen contact opnemen
- Admin ontvangt mail bij verzending

### 🛠 Extra's

- Specialisaties many-to-many (tussen users en services)
- Adminpanel voor specialisatiebeheer
- Mooi navmenu afhankelijk van rol (admin/user)
- Mooie loginpagina met achtergrond

---

## 🗃 Models & Relaties

- **User ↔ Services** (many-to-many)
- **News → Comments** (one-to-many)
- **FaqCategory → Faq** (one-to-many)
- **User → News** (one-to-many auteurrelatie)

---

## 📁 Structuur en Bestanden

Alle routes via controllers  
Alle forms met CSRF  
Client-side validation  
Auth policies voor rechtenbeheer  
Gebruik van Laravel components (nav-link, layouts, dropdowns)

---

## 🧪 Installatiehandleiding

1. Clone de repo:
   ```bash
   git clone <https://github.com/milatxx/beauty-hora>
   cd beauty-hora

2. Installeer dependencies:
   composer install
   npm install && npm run build

3. Configureer .env:
   cp .env.example .env
   php artisan key:generate

4. Run migraties + seeders:
   php artisan migrate:fresh --seed

5. Start lokale server:
   php artisan serve

6. (Optioneel) Link storage:
   php artisan storage:link

## 🧪 Default admin account

Rol: Admin

Email: admin@ehb.be

Wachtwoord: Password!321

## 📷 Screenshots

(Screenshots toevoegen van dashboard, profiel, booking, nieuws, adminpanelen...)

## 📚 Gebruikte bronnen

- Laravel Docs
- Laravel Breeze
- Lucide Icons
- ChatGPT (assistentie bij debugging en structuur)

Laatste update: 25-05-2025
