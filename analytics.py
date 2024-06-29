import pandas as pd
import matplotlib.pyplot as plt

# Load the JSON file
df = pd.read_json('user_activities.json')

# Process and analyze data
df['created_at'] = pd.to_datetime(df['created_at'])
df['day_of_week'] = df['created_at'].dt.day_name()  # Get the day of the week

# Example: Plot activity count by day of the week
activity_by_day = df.groupby('day_of_week').size()

# Reorder the days of the week for plotting
days_order = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
activity_by_day = activity_by_day.reindex(days_order)

plt.figure(figsize=(10, 6))
activity_by_day.plot(kind='bar')
plt.title('User Activity by Day of the Week')
plt.xlabel('Day of the Week')
plt.ylabel('Activity Count')
plt.savefig('public/user_activity_by_day.png')  # Save in public directory
plt.show()
