
# PowerGym 🏋️‍♂️

## Description
**PowerGym** is a web application tailored for fitness enthusiasts. It provides **AI-driven workout recommendations**, an **IMC (BMI) calculator**, and interactive **analytics dashboards** to enhance gym training experiences.

## Features
- 📈 **AI-Powered Workout Recommendations**
- ⚖️ **Body Mass Index (IMC) Calculator**
- 📊 **Interactive Analytics Dashboards**
- 🔗 **RESTful API Integration**

## Tech Stack
- **Backend:** Laravel (PHP), Flask (Python)
- **Frontend:** HTML, CSS, Bootstrap
- **Database:** MySQL
- **Visualization:** Plotly
- **Other Tools:** Git, GitHub

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/dalibouzir/PowerGym.git
   cd PowerGym
   ```

2. **Backend Setup (Laravel)**
   - Install dependencies
     ```bash
     composer install
     ```
   - Configure your `.env` file for database settings.
   - Run migrations
     ```bash
     php artisan migrate
     ```
   - Start Laravel server
     ```bash
     php artisan serve
     ```

3. **Python Microservices (Flask API)**
   - Navigate to the Flask directory
     ```bash
     cd flask_api
     ```
   - Install Python dependencies
     ```bash
     pip install -r requirements.txt
     ```
   - Start Flask server
     ```bash
     python app.py
     ```

4. **Access the app**
   Open your browser at [http://localhost:8000](http://localhost:8000)

## Project Structure
```
PowerGym/
├── app/ (Laravel application)
├── flask_api/ (Python Flask API for ML)
├── public/
├── resources/
├── routes/
├── database/
├── README.md
└── .env.example
```

## Future Improvements
- Add user authentication (OAuth 2.0 integration)
- Extend machine learning models for personalized nutrition plans
- Mobile app version with React Native

## Author
👨‍💻 **Bouzir Mohamed Ali**  
📧 bouzirdali@gmail.com  
🔗 [GitHub Profile](https://github.com/dalibouzir)
