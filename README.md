# Cove (personal rebuild)

A private, ad-free place to document your life — photos, notes, links, and voice memos, sorted into themed spaces called **Coves**, instead of one endless feed.

This is a personal, non-commercial rebuild inspired by [Cove](https://apps.apple.com/us/app/cove-document-your-life/id6740141065) by Cove Labs, Inc. (the app YouTube/TikTok creator Lenalifts built with her brother). Built for personal use only — not affiliated with or endorsed by Cove Labs.

## What it is

Not a workout tracker. Cove is closer to a private scrapbook:

- **Coves** — themed collections you create (a trip, a hobby, a relationship, a goal)
- **Entries** — photos, notes, links, voice memos, or songs saved into a Cove
- **Timeline feed** — each Cove shows its entries newest-first
- **Search** — full-text search across everything you've saved
- **Private by default** — sharing is opt-in, per-Cove, invite-only
- **No ads, no algorithm** — nothing ranks or monetizes your attention
- **Installs like a native app** — home-screen icon, full-screen, works offline (PWA)

### Mockup

![Five core screens: sign-in, Coves list, Cove timeline, add-entry sheet, search & sharing](docs/cove-mockup-screens.png)

Full interactive version (all screens + a feature breakdown): see `docs/cove-mockup.html`, or the [published mockup](https://claude.ai/code/artifact/15132d24-c4bf-4c4e-b598-2ef5dbaeaa90).

## Tech stack

| Layer | Choice | Why |
|---|---|---|
| Backend | Laravel 11 | Matches existing PHP/Laravel experience |
| Database | SQLite | Single file, zero server — right-sized for a single-user personal app |
| Auth | Laravel Breeze (Livewire stack) | Email/password + social login, minimal hand-written JS |
| Reactive UI | Livewire | Server-driven components, no separate frontend framework |
| Admin/back office | Filament | Fast CRUD over Coves/Entries/Users, managed from a desktop browser |
| Consumer UI | Blade + Tailwind | The actual phone-facing app, styled to match the mockup |
| Installability | Web manifest + service worker (PWA) | Home-screen install without an App Store |

## Roadmap

| Phase | Scope | Est. time | Status |
|---|---|---|---|
| 0. Setup | Laravel install, Breeze auth, git, Filament installed | 1 week | ✅ Done |
| 1. Data layer | Migrations + models (Cove, Entry, Tag) + Filament Resources | 1–2 weeks | Not started |
| 2. Consumer MVP UI | Livewire: Coves list, timeline, add-entry sheet | 2–3 weeks | Not started |
| 3. Multi-type entries + tags | Voice/link/music entries, tagging UI | 2 weeks | Not started |
| 4. Search | Full-text search (Laravel Scout) | 1–2 weeks | Not started |
| 5. PWA polish | Offline caching, installability, mobile UX pass | 1–2 weeks | Not started |
| 6. Sharing | Invite a second user into a shared Cove | 2–3 weeks | Not started |

**MVP target (through Phase 2):** ~5–7 weeks. **Full personal version (through Phase 6):** ~10–13 weeks, at roughly 8–10 focused hours/week.

## Progress log

### Phase 0 — Setup ✅ complete
- [x] Cloned repo, created `cove-app-dev` branch
- [x] Scaffolded Laravel 11 via Composer
- [x] Confirmed local dev server runs (`php artisan serve`)
- [x] Switched to SQLite for local database
- [x] Installed Laravel Breeze with the Livewire stack (auth scaffolding)
- [x] Ran initial migrations (`users`, `cache`, `jobs`)
- [x] Verified register/login flow end-to-end
- [x] Enabled PHP `zip` extension (Laragon php.ini) — required by Filament's export dependency
- [x] Installed Filament v4 (`composer require filament/filament:"^4.0" -W`), pinned to v4 to stay compatible with Breeze's Livewire 3
- [x] Ran `filament:install --panels`, created admin user, confirmed `/admin` loads and logs in

### Phase 1 — Data layer (next up)
- [ ] Design the Cove/Entry/Tag data model (fields, relationships)
- [ ] Create migrations
- [ ] Create Eloquent models + relationships
- [ ] Create Filament Resources for Cove and Entry
- [ ] Confirm CRUD works end-to-end through `/admin`

## Getting started (local dev)

```bash
git clone https://github.com/wickette/cove_dup_app.git cove
cd cove
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
# set DB_CONNECTION=sqlite in .env, remove/comment the other DB_* lines
php artisan migrate
npm install && npm run build
php artisan serve
```

Visit `http://127.0.0.1:8000`.
