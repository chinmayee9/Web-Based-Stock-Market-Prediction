#Software Engineering Group-14
import numpy as np
import matplotlib.pyplot as plotter
import MySQLdb
import sys
import urllib2

def historicalData(ticker):
	historicalPrices = []

    # login to API
	urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
	url = "http://api.kibot.com/?action=history&symbol=" + ticker + "&interval=daily&period=" + sys.argv[2] + "&unadjusted=1&regularsession=1"
	apiData = urllib2.urlopen(url).read().split("\n")
	for line in apiData:
		if(len(line)>0):
		   tempLine=line.split(',')
		   price=float(tempLine[2])
		historicalPrices.append(price)
	#print historicalPrices
	return historicalPrices


def ExpMovingAverage(values, window):
	weights = np.exp(np.linspace(-1., 0., window))
	#print weights
	weights /= weights.sum()
	a =  np.convolve(values, weights, mode='full')[:len(values)]
	#a[:window] = a[window]
	#print a
	return a

def SimpleMovingAverage(values, window):
	ma=[]
	sum=0
	for i in range(0,window):
		#print i
		sum=sum+values[i]
		ma.append(sum/(i+1))
	#print ma
	return ma

list_of_prices = historicalData(sys.argv[1])

l = len(list_of_prices)
x_ax = np.linspace(0,l,l);
plotter.plot(x_ax, list_of_prices,label="Trendline")
plotter.grid('on')
plotter.xlabel('Number of days')
plotter.ylabel('Closing price')
#print len(list_of_prices)
#plotter.title(str(sys.argv[]))
#plotter.xlim([0, 30])

ema=ExpMovingAverage(list_of_prices,int(sys.argv[2])/7)
plotter.plot(x_ax,ema,label="EMA")
#plotter.annotate('EMA')

sma=SimpleMovingAverage(list_of_prices,l)
plotter.plot(x_ax,sma,label="SMA")
#print sma
plotter.savefig('plot.png')
plotter.legend(bbox_to_anchor=(0.70, 0.25), loc=2, borderaxespad=0.)
#plotter.show()
