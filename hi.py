#!/usr/bin/env python2
'''
Say hello!
'''
import random
 
x = int(random.random() * 5.0)
if x == 0:
  print 'Hello, world!'
elif x == 1:
  print 'Moshi moshi!'
elif x == 2:
  print 'HI HI HI HI HI'
elif x == 3:
  print 'What\'s up?'
else:
  print 'Bonjour!'
