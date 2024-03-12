## Setup
- pull the repo `git clone git@github.com:reppair/risk-advisor.git`
- create a mysql database called `risk_advisor`
- cd into the project `cd risk-advisor`
- install php black hole `composer install`
- install javascript black hole `npm install`
- build the front-end `npm run build`
- clone the `.env.example` file to `.env` - `cp .env.example .env`
- create app key `php artisan key:generate`
- migrate the database and seed it `php artisan migrate --seed`
- serve the app with your preferred web server, or `php artisan serve`
- visit the landing page and submit an insurance enquiry 🚀

## Testing
Requires SQLite3 for in memory testing. Run the test by `php artisan test` or `php artisan test --coverage` (requires xdebug).

The test coverage currently looks like this:
```shell
  Console/Kernel .................................................................................................................................. 16 / 66.7%
  Enum/ContactPreference .............................................................................................................................. 100.0%
  Exceptions/Handler .................................................................................................................................. 100.0%
  Http/Controllers/Auth/AuthenticatedSessionController ................................................................................................ 100.0%
  Http/Controllers/Auth/ConfirmablePasswordController ................................................................................................. 100.0%
  Http/Controllers/Auth/EmailVerificationNotificationController ......................................................................................... 0.0%
  Http/Controllers/Auth/EmailVerificationPromptController ......................................................................................... 20 / 66.7%
  Http/Controllers/Auth/NewPasswordController ............................................................................................. 65..66, 67 / 87.5%
  Http/Controllers/Auth/PasswordController ............................................................................................................ 100.0%
  Http/Controllers/Auth/PasswordResetLinkController ....................................................................................... 47..48, 49 / 78.6%
  Http/Controllers/Auth/RegisteredUserController ...................................................................................................... 100.0%
  Http/Controllers/Auth/VerifyEmailController ..................................................................................................... 19 / 80.0%
  Http/Controllers/Controller ......................................................................................................................... 100.0%
  Http/Controllers/ProfileController .................................................................................................................. 100.0%
  Http/Controllers/StoreEnquiry ....................................................................................................................... 100.0%
  Http/Kernel ......................................................................................................................................... 100.0%
  Http/Middleware/Authenticate .......................................................................................................................... 0.0%
  Http/Middleware/EncryptCookies ...................................................................................................................... 100.0%
  Http/Middleware/HandleInertiaRequests ............................................................................................................... 100.0%
  Http/Middleware/PreventRequestsDuringMaintenance .................................................................................................... 100.0%
  Http/Middleware/RedirectIfAuthenticated ......................................................................................................... 24 / 80.0%
  Http/Middleware/TrimStrings ......................................................................................................................... 100.0%
  Http/Middleware/TrustHosts ............................................................................................................................ 0.0%
  Http/Middleware/TrustProxies ........................................................................................................................ 100.0%
  Http/Middleware/ValidateSignature ................................................................................................................... 100.0%
  Http/Middleware/VerifyCsrfToken ..................................................................................................................... 100.0%
  Http/Requests/Auth/LoginRequest ..................................................................................................... 66..73, 75..74 / 65.2%
  Http/Requests/ProfileUpdateRequest .................................................................................................................. 100.0%
  Models/Customer ..................................................................................................................................... 100.0%
  Models/Enquiry ...................................................................................................................................... 100.0%
  Models/Product ...................................................................................................................................... 100.0%
  Models/User ......................................................................................................................................... 100.0%
  Providers/AppServiceProvider ........................................................................................................................ 100.0%
  Providers/AuthServiceProvider ....................................................................................................................... 100.0%
  Providers/BroadcastServiceProvider .................................................................................................................... 0.0%
  Providers/EventServiceProvider ...................................................................................................................... 100.0%
  Providers/RouteServiceProvider .................................................................................................................. 28 / 90.0%
  ────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────
                                                                                                                                                 Total: 85.9 %
```

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
