#  Recipe Application

A recipe management application built with **Laravel 9**, **MySQL**, and **Alpine.js** and **Tailwind css**.  
The app runs inside **Docker Compose** for easy setup and deployment.

---

##  Features
- Browse all recipes (public access)
- Advanced recipe search
- User authentication (Login/Register)
- **Roles**:
  - **Normal User**: Can add recipes to favorites  
  - **Admin**: Can add, edit, and delete recipes
- Get a random recipe with one click

---

## 🚀 Installation
1. **Clone the repository**
 ```bash
   git clone https://github.com/your-username/recipe-app.git
    cd recipe-app
 ```
2. **Install Docker and Docker Compose**
3.  **Start containers**
```docker-compose up -d```
4. **Run database migrations**
```docker-compose exec app php artisan migrate```
5. **Seed the database**
```docker-compose exec app php artisan db:seed```

---

## 📖 Usage

- Open your browser and navigate to:  
👉 [http://localhost:8000](http://localhost:8000)

- From here, you can:
- Browse recipes and search with filters
- Register for an account to add recipes to your favorites
- Log in as an **Admin** to manage (add, edit, delete) recipes

---

## 🛠 Tech Stack
- **Backend:** Laravel 9  
- **Frontend:** Alpine.js, Tailwind css
- **Database:** MySQL  
- **DevOps:** Docker, Docker Compose  
