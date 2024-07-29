# Travel Forecast App

## Overview

Travel Forecast App offers tourists visiting Japan places and weather information. The application is aesthetically pleasing, easy to navigate, and contains relevant information.

## Requirements

### Server-side (Laravel v11.x)

- **PHP**: 8.2 or higher

### Client-side (Vue3 with Composition API)

- **Node.js**: 18.3 or higher

## Installation

### Clone the repository

```bash
git clone https://github.com/jestoniferido/travel-forecast.git
```

```bash
cd travel-forecast
```

## Features

- **Single Page Application (SPA)**: Smooth and seamless user experience without full page reloads.
- **Decoupled Architecture**: Front-end and back-end are separate, enhancing flexibility and scalability.
- **Place Details**: Provides detailed information and images.
- **Weather Information**: Displays current weather conditions and 5 Day / 3 Hour Forecast.
- **Navigation**: Easy navigation between pages using Vue Router.
- **Responsive Design**: Viewing experience on various devices.
- **Modern UI**: Uses modern, vibrant colors, and dark/light selection for an engaging user experience.

## UI/UX Implementation

### Design Principles

1. **Visual Hierarchy**: Clear visual hierarchy using colors, typography, and spacing.
2. **Consistency**: Consistent design elements and patterns are used throughout the app to provide a seamless experience.

### Key UI Components

- **Header**: Displays the app logo and dark/light selection.
- **Places Selector**: Allows users to select different places.
- **Weather**: Show weather information for different places.
- **Place Details**: Provide additional information like addresses and related places of the places.

### Modern Colors

I use vibrant colors to create an appealing and modern look.

### Responsive Design

The app is fully responsive, which means that it will work well on any device, including mobile phones, tablets, and desktop computers.

## Code Implementation

### Technology Stack

- **Frontend**: Vue.js, Vue Router, Axios
- **Backend**: Laravel (for API development)
- **Styling**: Tailwind CSS

### Project Structure

- `frontend/`: Contains all the frontend code.
  - `components/`: Vue components for various UI elements.
  - `views/`: Vue components representing different pages.
  - `router/`: Configuration for Vue Router.
  - `services/`: Separate services for fetching data from api.
  - `assets/`: Static assets like images and styles.
- `backend/`: Laravel backend code for getting and serving weather data and place information.
  - `app/Http/Controllers`: Single action controllers handling API requests.
  - `app/Http/Resources`: API resources for formatting weather and place details responses.
  - `app/Services`: Separate services for handling logic related to weather and place information.
  - `routes`: Route definitions for API endpoints.

### Key Code Elements

- **Vue Router**: Manages navigation within the app.
- **Axios**: Used for HTTP requests to fetch weather and place data from the backend.
- **Components**: Breaks down the UI into reusable components.
- **Services**: Encapsulates API calls related to fetching and processing data.
- **API Resources**: Transforms and formats data before sending it to the front end, ensuring consistent API responses.

### Running the App

1. **Backend Setup**:
   - Navigate to the `backend/` directory.
   - Run `composer install` to install dependencies.
   - Copy the `.env.example` as `.env`
   - Configure the `.env` file with your FOURSQUARE and OPENWEATHERMAP API KEY.
   - Run `php artisan serve` or `php -S 192.168.1.4:8000 -t .\public\` to start the backend server.

2. **Frontend Setup**:
   - Navigate to the `frontend/` directory.
   - Run `npm install` to install dependencies.
   - Copy the `.env.example` as `.env`
   - Configure the `.env` file with your VITE_API_BASE_URL settings.
   - Run `npm run dev` to start the frontend development server.

3. **Accessing the App**:
   - Open a web browser and go to `http://localhost:5173` to view the app.

### Conclusion

Travel Forecast App is intended to be an application that gives information about places and the weather. Possible future additions and upgrades may include the addition of new features, additional information, and refinement of the user interface and experience.
