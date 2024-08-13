# Aksamedia Backend Intern Test

This repository was created to fulfill the requirements for the backend internship test at Aksamedia.

## Tasks

- [x] **Login**

  - **Method:** POST
  - **Endpoint:** /login
  - **Expected Request Body:**

  ```json
  {
    "username": "admin",
    "password": "admin"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message",
    "data": {
      "token": "authentication token",
      "admin": {
        "id": "admin uuid",
        "name": "admin name",
        "username": "admin username",
        "phone": "admin phone number",
        "email": "admin email"
      }
    }
  }
  ```

- [x] **Retrieve All Divisions**

  - **Method:** GET
  - **Endpoint:** /divisions
  - **Request Header (after login):**

  ```json
  {
    "Authorization": "Bearer token"
  }
  ```

  - **Expected Query Parameter:**

  ```json
  {
    "name": "search name"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message",
    "data": {
      "divisions": [
        {
          "id": "division uuid",
          "name": "division name"
        },
        {
          "id": "division uuid",
          "name": "division name"
        }
      ]
    },
    "pagination": {
      "laravel pagination attributes": "..."
    }
  }
  ```

- [x] **Retrieve All Employees**

  - **Method:** GET
  - **Endpoint:** /employees
  - **Request Header (after login):**

  ```json
  {
    "Authorization": "Bearer token"
  }
  ```

  - **Expected Query Parameter:**

  ```json
  {
    "name": "search name",
    "division_id": "division uuid"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message",
    "data": {
      "employees": [
        {
          "id": "employee uuid",
          "image": "employee photo url",
          "name": "employee name",
          "phone": "employee phone number",
          "division": {
            "id": "division uuid",
            "name": "division name"
          },
          "position": "employee position"
        },
        {
          "id": "employee uuid",
          "image": "employee photo url",
          "name": "employee name",
          "phone": "employee phone number",
          "division": {
            "id": "division uuid",
            "name": "division name"
          },
          "position": "employee position"
        }
      ]
    },
    "pagination": {
      "laravel pagination attributes": "..."
    }
  }
  ```

- [x] **Create New Employee**

  - **Method:** POST
  - **Endpoint:** /employees
  - **Request Header (after login):**

  ```json
  {
    "Authorization": "Bearer token"
  }
  ```

  - **Expected Request Body:**

  ```json
  {
    "image": "employee photo file",
    "name": "employee name",
    "phone": "employee phone number",
    "division": "division uuid",
    "position": "employee position"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message"
  }
  ```

- [x] **Update Employee**

  - **Method:** PUT
  - **Endpoint:** /employees/{id}
  - **Request Header (after login):**

  ```json
  {
    "Authorization": "Bearer token"
  }
  ```

  - **Expected Request Body:**

  ```json
  {
    "image": "employee photo file",
    "name": "employee name",
    "phone": "employee phone number",
    "division": "division uuid",
    "position": "employee position"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message"
  }
  ```

- [x] **Delete Employee**

  - **Method:** DELETE
  - **Endpoint:** /employees/{id}
  - **Request Header (after login):**

  ```json
  {
    "Authorization": "Bearer token"
  }
  ```

  - **Expected Response:**

  ```json
  {
    "status": "success / error",
    "message": "success / error message"
  }
  ```

- [x] **Logout**
  - **Method:** POST
  - **Endpoint:** /logout
  - **Request Header (after login):**
  ```json
  {
    "Authorization": "Bearer token"
  }
  ```
  - **Expected Response:**
  ```json
  {
    "status": "success / error",
    "message": "success / error message"
  }
  ```
