# Deploy and Host Cockpit CMS on Railway

[![Deploy on Railway](https://railway.com/button.svg)](https://railway.com/new/template/cockpit?referralCode=sLjDXb&utm_medium=integration&utm_source=button&utm_campaign=cockpit)

[Cockpit](https://getcockpit.com/) is a self-hosted headless CMS — an API-first content platform that has been around for two decades. Model your content (collections, singletons, trees), manage it in a clean admin UI, and consume it from any frontend via REST or GraphQL. Assets, image presets, roles and permissions, localization, and webhooks are all built in.

## About Hosting Cockpit

This template runs Cockpit Core (free, open source) as a single Railway service on FrankenPHP. All content, the SQLite database, uploads, and cache persist on one volume at `/var/www/html/storage`. No external database is needed — SQLite handles the vast majority of headless CMS workloads. Upload limits are raised to 128 MB for media-heavy content.

## Common Use Cases

- Content backend for Next.js/Astro/SvelteKit sites — fetch via REST or GraphQL, deploy the frontend anywhere
- Lightweight alternative to Strapi/Directus when you want a CMS that idles in tens of megabytes, not gigabytes
- Multi-site content hub: Cockpit "Spaces" let one instance serve several projects

## Dependencies for Cockpit Hosting

- None — Cockpit Core with SQLite runs in the single service

### Deployment Dependencies

- [Cockpit documentation](https://getcockpit.com/documentation/core)
- [Cockpit API reference](https://getcockpit.com/documentation/core/api/endpoints)
- [Template source on GitHub](https://github.com/nomideusz/cockpit-railway)

### Implementation Details

**First boot — important:** open `https://<your-domain>/install` once. This creates the `admin` account and shows a **generated password on that page only** — save it before navigating away. Afterwards log in at `/auth/login`.

**Content API:** create an API key under Settings → Api & Security, then fetch content at `/api/content/items/{model}` (REST) or `/api/graphql` (GraphQL).

Notes and limits:

- Storage (content, uploads, thumbnails) is bounded by your volume size — grow it in service settings.
- `PORT` is used by Railway's healthcheck probing — leave it at 80.
- This runs Cockpit Core. Cockpit Pro features (Spaces sync, advanced addons) require a license from the Cockpit team — the image can be swapped to `pro` tags in the template source.

## Why Deploy Cockpit CMS on Railway?

Railway is a singular platform to deploy your infrastructure stack. Railway will host your infrastructure so you don't have to deal with configuration, while allowing you to vertically and horizontally scale it.

By deploying Cockpit CMS on Railway, you are one step closer to supporting a complete full-stack application with minimal burden. Host your servers, databases, AI agents, and more on Railway.
