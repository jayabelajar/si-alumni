# Phase 4: Core Features (CRUD & Logic)

## Prompt 4.1: Admin Alumni Management
```text
Act as a Backend Developer. Build the 'ManageAlumni' controller for Admins:
1. Implement 'index' to list all alumni with pagination.
2. Implement 'edit' and 'update' to modify any alumni data.
3. Implement 'delete' to remove records.
4. Ensure all changes are validated using the AlumniModel rules.
```

## Prompt 4.2: Alumni Self-Profile Management
```text
Build the 'Profile' controller for Alumni users:
1. Implement a method to view and edit their own profile data only.
2. Use the session 'user_id' to verify ownership—never trust a URL ID for alumni updates.
3. Allow updating employment status, company, and position.
```
