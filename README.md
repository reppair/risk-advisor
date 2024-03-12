## Setup
- pull the repo `git clone git@github.com:reppair/risk-advisor.git`
- create a mysql database called `risk_advisor`
- cd into the project `cd risk-advisor`
- install php black hole `composer install`
- install javascript black hole 'npm install'
- build the front-end `npm run build`
- clone the `.env.example` file to `.env` - `cp .env.example .env`
- create app key `php artisan key:generate`
- migrate the database and seed it `php artisan migrate --seed`
- serve the app with your preferred web server, or `php artisan serve`
- visit the landing page and submit an insurance enquiry 🚀

## Testing
Requires SQLite3 for in memory testing. Run the test by `php artisan test`.

## Outro
I decided to follow KISS principle and toy around with Inertia for the first time instead of data modeling. It feels
good building with Inertia, although I just barely touched the surface of it today. I've been doing a lot of Livewire
last few years so my Vue is a bit rusty, so I went with what I know - options API, but I got my eyes on the composition
API - I'll be learning it.

Anyway, I started at 19:45 today, now it is 2:25 so that is what, 6.5 hours? Yeah... that is with several interruptions
after a 12 hours work day today, prior starting this task so not my best turn around time, nor it is a masterpiece,
but it will do just fine for a demo I think.

Cheers!
It has been a pleasure!
