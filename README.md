# Shai Community Donation Platform

**Repository**

`public` searsandrew/shai.git

**License**
Shai is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

**Framework**
* laravel/framework: ^8.40

**Packages**
* codedge/laravel-fpdf: ^1.8
* laravel/jetstream: ^2.3
* livewire/livewire: ^2.0
* lorisleiva/laravel-actions: ^2.1
* spatie/laravel-tags: ^3.1
* owen-it/laravel-auditing: ^12.0

**Features**
* User Permissions, with basic env controlled admin.
* Homepage/Landing page with campaign specific styling and verbage, editable per-campaign with easy-to-use settings.
* Donee CRUD for inputting and listing individual Donee's.
* Donee grouping into family groups.
* Donee last-name privacy at the Donee, Family, or Campaign level.
* Donor (User) linking for multiple Donee's.
* Print a PDF of labels for all Donee's, labels include a QR code - when scanned a Donor can create an account and claim the Donee.
* QR Code can be scanned by an injesting account to mark a donation has been returned.
* Email summary of Donee selected is automatically emailed upon selection, Admin's can optionally resend the emails.
* Auditing tools to keep track of changes.
* Multi-lingual support.

**In Development**
* Rhobust tagging system to find Donee's from specific tags.
* Quality of Life improvements.
* Better responsive styling and small improvements.

**Package Released**

`Shai v0.1`