# Phase 3: Authentication & Security (RBAC)

## Prompt 3.1: Auth Controller Logic
```text
Act as a Security Specialist. Create an 'Auth' Controller with:
1. 'login' method: Validate credentials and set session data (user_id, role, isLoggedIn).
2. 'register' method: Specifically for Alumni, creating both a 'user' and a linked 'alumni' record.
3. 'logout' method: Destroy the session.
```

## Prompt 3.2: Filters (Middleware)
```text
Implement two CI4 Filters for access control:
1. 'AuthFilter': Redirect to login if the session 'isLoggedIn' is false.
2. 'AdminFilter': Redirect with an error if the session 'role' is not 'admin'.
Register these filters in 'app/Config/Filters.php'.
```

## Prompt 3.3: Routing Security
```text
Update 'app/Config/Routes.php':
1. Group '/admin' routes to use both 'AuthFilter' and 'AdminFilter'.
2. Group '/alumni' routes to use 'AuthFilter'.
3. Set default redirect for the '/' root based on the user's role after login.
```
