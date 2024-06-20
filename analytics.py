import pandas as pd
import matplotlib.pyplot as plt

# Load the CSV file
df = pd.read_csv('user_activities.csv')

# Process and analyze data
df['created_at'] = pd.to_datetime(df['created_at'])
df['hour'] = df['created_at'].dt.hour

# Example: Plot activity count by hour
activity_by_hour = df.groupby('hour').size()

plt.figure(figsize=(10, 6))
activity_by_hour.plot(kind='bar')
plt.title('User Activity by Hour')
plt.xlabel('Hour of the Day')
plt.ylabel('Activity Count')
plt.savefig('user_activity_by_hour.png')
plt.show()
