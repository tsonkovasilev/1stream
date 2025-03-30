<p align="center"><a href="https://1-stream.com/" target="_blank"><img src="https://media.licdn.com/dms/image/v2/D4D0BAQFtRE55TiWz6A/company-logo_200_200/company-logo_200_200/0/1716463497277/1_stream_logo?e=2147483647&v=beta&t=fFOgAfiNiZuxsjwVPVvQz1Y7NsFEWm1XFhCO2AqYoD8"></a></p>


# Laravel 12 Web Streams CRUD

A Laravel 12 application for managing **Web Streams** with a clean MVC architecture, REST API, and minimalistic Blade UI. Includes user authentication, ownership logic, and API key-based access.

---

## 🔧 Setup

1. Clone the repo and install dependencies:
   composer install
   npm install && npm run build

2. Copy `.env.example` to `.env` and update your DB credentials

3. Run migrations and seeders:
   php artisan migrate --seed

4. Start the server (use Herd or Valet, or run):
   php artisan serve



## 📦 Features

### ✅ Web App
- `/login` — simple login screen
- `/dashboard` — guest sees all streams, user sees their own
- Add/Edit/Delete only own streams

### ✅ REST API
- Protected via `api_key` (query or header)
- `GET /api/streams` — list (with filters, sort)
- `POST /api/streams` — create stream
- `PUT /api/streams/{uuid}` — update own stream
- `DELETE /api/streams/{uuid}` — delete own stream
- `GET /api/me` — return user info

### ✅ API Key Auth Middleware
- Middleware `ApiKeyAuth` checks API key and sets `auth()` user
- Each user has static `api_key` defined in DB

---

## 🌱 Seeded Data
- Users: `test1` / `test1`, `test2` / `test2`
- Stream Types: Sports, E-Book, Podcast, Arts, Music
- Sample streams per user

---

## 🎨 UI Styling
- Shared layout using `.wrapper`, `.logo`, `app.css`
- Styled login, dashboard, edit/create forms
- Table with DataTables.js integration

---

## 📁 Project Structure
- `app/Http/Controllers/StreamController.php` — Blade views
- `app/Http/Controllers/Api/StreamApiController.php` — REST API
- `app/Http/Middleware/ApiKeyAuth.php` — API key middleware
- `resources/views/` — login, dashboard, edit/create Blade views
- `public/css/app.css` — minimal shared styles

---

## 🔗 API Example URLs (for testing)
> Replace `YOUR_API_KEY` and `STREAM_UUID` with actual values from your seeded data

### 🔍 List Streams
GET http://localhost:8000/api/streams?api_key=YOUR_API_KEY

### 📥 Create Stream
POST http://localhost:8000/api/streams?api_key=YOUR_API_KEY
json
{
  "title": "New Stream",
  "description": "Test stream from Postman",
  "tokens_price": 150,
  "type": 3,
  "date_expiration": "2025-06-30 23:59:59"
}

### 📝 Update Stream
PUT http://localhost:8000/api/streams/STREAM_UUID?api_key=YOUR_API_KEY
json
{
  "title": "Updated Stream",
  "description": "Updated description",
  "tokens_price": 200,
  "type": 2,
  "date_expiration": "2025-07-10 12:00:00"
}

### ❌ Delete Stream
DELETE http://localhost:8000/api/streams/STREAM_UUID?api_key=YOUR_API_KEY

### 👤 Get Authenticated User Info
GET http://localhost:8000/api/me?api_key=YOUR_API_KEY