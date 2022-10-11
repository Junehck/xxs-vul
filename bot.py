# -*- coding: utf-8 -*-
import sys
import codecs
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())

from selenium import webdriver
driver = webdriver.PhantomJS()
driver.get("http://127.0.0.1/admin/admin_msg.php")
print(driver.title)#title
