
import tweepy
import pandas as pd

auth = tweepy.OAuthHandler("OryHjr7PLJPJqHwzeWo8aaFrj", "vToNwyrWLyhLATFozizm7afZWoAk4owNagyqtlOISTODnYdZg9")
auth.set_access_token("1408955612-LWEaxRXXUQHYD8OfKjWGC3PNwEMzfXgtnFtja56", "myCK7kvnHXC2SvWtkNHS5bZQA3Vyah08ftaz1dUy9If6M")

api = tweepy.API(auth)
public_tweets = api.home_timeline()

for tweet in public_tweets:
    print(tweet)