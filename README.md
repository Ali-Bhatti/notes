# 📝 Notes App

A simple, elegant note-taking application built with Laravel 12 and Tailwind CSS.

## Features

- **Create Notes**: Write and save your thoughts, ideas, and important information
- **View Notes**: Beautiful card-based layout with easy-to-read formatting
- **Edit Notes**: Update your notes anytime with a clean editing interface
- **Delete Notes**: Remove notes you no longer need with confirmation prompts
- **User Authentication**: Secure login and registration system
- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Modern UI**: Clean, professional interface built with Tailwind CSS

## Screenshots

The application features a modern, card-based design with:
- Grid layout for note overview
- Detailed view for reading full notes
- Clean editing interface
- Responsive navigation

## Tech Stack

- **Framework**: Laravel 12
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL/SQLite
- **Authentication**: Laravel's built-in authentication
- **Environment**: Laravel Herd

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd notes
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate:refresh --seed
   ```

6. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

## Usage

The application is served by Laravel Herd and will be available at `https://notes.test` (or similar based on your project directory name).

### Default User
After running the seeder, you can login with:
- **Email**: test@example.com
- **Password**: password

## Development

**Start the development server:**
```bash
composer run dev
# or
npm run dev
```

**Run tests:**
```bash
php artisan test
```

**Format code:**
```bash
vendor/bin/pint
```

## Project Structure

```
app/
├── Models/
│   ├── Note.php          # Note model with relationships
│   └── User.php          # User model with note relationships
resources/
├── views/
│   ├── components/
│   │   └── layout.blade.php    # Main layout component
│   └── note/
│       ├── index.blade.php     # Notes listing (card grid)
│       ├── show.blade.php      # Individual note view
│       ├── edit.blade.php      # Note editing form
│       └── create.blade.php    # New note creation form
database/
├── factories/
│   └── NoteFactory.php         # Factory for generating test notes
└── migrations/
    └── create_notes_table.php  # Note table structure
```

## Key Features Explained

### Note Model
- Belongs to a User (authenticated notes)
- Uses HasFactory trait for testing
- Fillable fields: note, user_id
- Timestamps for created/updated tracking

### UI Components
- **Card Grid**: Responsive grid layout for note overview
- **Note Cards**: Clean cards with preview, metadata, and action buttons
- **Forms**: Consistent styling for create/edit operations
- **Navigation**: Breadcrumb-style navigation between views

### Authentication
- Notes are tied to authenticated users
- Login/logout functionality in main navigation
- User-specific note access

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Run tests and formatting
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

Built with ❤️ using Laravel 12 and Tailwind CSS