import pandas as pd
import joblib
import json
from datetime import datetime, timedelta

def load_model_and_predict():
    try:
        # Load the model
        model = joblib.load('C:/laragon/www/Test1/storage/app/predictive_model.pkl')

        # Get the current date
        today = datetime.now()
        
        # Initialize a dictionary to store predictions for each day
        weekly_predictions = {}

        # Predict for each day of the upcoming week
        for i in range(7):
            future_date = today + timedelta(days=i)
            data_for_prediction = pd.DataFrame({
                'day_of_week': [future_date.weekday()],
                'month': [future_date.month],
                'total_price': [100],  # Example total price
                'hours_since_created': [5]  # Example hours since created
            })

            # Convert DataFrame to NumPy array for prediction
            data_for_prediction = data_for_prediction.values

            # Make prediction using the model
            prediction = model.predict(data_for_prediction)

            # Store the prediction in the dictionary
            weekly_predictions[future_date.strftime('%A')] = round(prediction[0], 2)
        
        # Output weekly predictions as JSON
        print(json.dumps(weekly_predictions))

    except FileNotFoundError as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    load_model_and_predict()
