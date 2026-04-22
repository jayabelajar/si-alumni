# Phase 2: Database Schema & Models

## Prompt 2.1: Users Table Migration
```text
Act as a Database Engineer. Create a migration file for the 'users' table:
- Fields: id (INT, PK, AI), username (VARCHAR, unique), password (VARCHAR), role (ENUM: 'admin', 'alumni'), created_at, updated_at.
- Run the migration and confirm the table is created.
```

## Prompt 2.2: Alumni Table Migration
```text
Continue as the Database Engineer. Create a migration for the 'alumni' table:
- Fields: id (INT, PK, AI), user_id (INT, FK to users.id), nim (VARCHAR, unique), full_name (VARCHAR), major (VARCHAR), graduation_year (YEAR), status (ENUM: 'employed', 'unemployed', 'other'), company (VARCHAR, nullable), position (VARCHAR, nullable).
- Ensure the foreign key relationship is indexed.
```

## Prompt 2.3: Models & Seeding
```text
Now, create CI4 Models for 'UserModel' and 'AlumniModel' with:
1. $allowedFields matching the migrations.
2. Character/Type validation rules.
3. Create a Seeder named 'AdminSeeder' to insert one default admin user (username: admin, password: hashed_password, role: admin).
```
