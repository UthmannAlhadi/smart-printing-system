# train_model.py
import pandas as pd
from sklearn.linear_model import LinearRegression
from sklearn.model_selection import train_test_split
from sklearn.impute import SimpleImputer
import joblib

# Load and preprocess data
data = pd.read_csv('storage/app/orders.csv')
data['created_at'] = pd.to_datetime(data['created_at'])
data['time'] = pd.to_datetime(data['time'])

# Extract day of week and month from 'created_at'
data['day_of_week'] = data['created_at'].dt.dayofweek
data['month'] = data['created_at'].dt.month

# Convert 'time' to hours since it was created as a numeric value
data['hours_since_created'] = (data['time'] - data['created_at']).dt.total_seconds() / 3600

# Drop rows where 'total_price' or 'copies' is missing
data = data.dropna(subset=['total_price', 'copies'])

# Drop the 'created_at' and 'time' columns as they are non-numeric
data = data.drop(columns=['created_at', 'time'])

# Initialize a dictionary to store models for each day of the week
models = {}

# Train a separate model for each day of the week
for day in range(7):
    day_data = data[data['day_of_week'] == day]
    
    if not day_data.empty:
        X = day_data[['month', 'total_price', 'hours_since_created']]
        y = day_data['copies']
        
        # Handle missing values
        imputer = SimpleImputer(strategy='mean')
        X = imputer.fit_transform(X)
        
        # Split data into training and test sets
        X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)
        
        # Train model
        model = LinearRegression()
        model.fit(X_train, y_train)
        
        # Save model for this specific day
        models[day] = model
        joblib.dump(model, f'storage/app/predictive_model_day_{day}.pkl')

# Save the models dictionary (optional, for later use)
joblib.dump(models, 'storage/app/predictive_models.pkl')
