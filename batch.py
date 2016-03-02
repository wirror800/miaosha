#!/usr/bin/python
# encoding=utf-8
# Filename: batch.py

import threading
import datetime
import time
import os
  
class ThreadImpl(threading.Thread):
    def __init__(self, cmd):
        threading.Thread.__init__(self)
        self._cmd = cmd

    def execCmd(self, cmd):
        try:
            print "命令%s开始运行%s\r\n" % (cmd,datetime.datetime.now())
            os.system(cmd)
            print "命令%s结束运行%s\r\n" % (cmd,datetime.datetime.now())
        except Exception, e:
            print '%s\t 运行失败,失败原因\r\n%s\r\n' % (cmd,e)
  
    def run(self):
        global total, mutex
         
        # 打印线程名
        print threading.currentThread().getName()
        self.execCmd(self._cmd)
  
        mutex.acquire()
        total = total + 1
        mutex.release()
  
if __name__ == '__main__':
    #定义全局变量
    global total, mutex
    total = 0
    # 创建锁
    mutex = threading.Lock()

    print "程序开始运行%s\r\n" % datetime.datetime.now()
     
    #定义线程池
    threads = []

    # 创建线程对象
    fh = open("tel.txt")
    #for x in xrange(0, num):
    for line in fh.readlines():
        cmd = ' '.join(['php run.php', line])
        threads.append(ThreadImpl(cmd))
    # 启动线程
    for t in threads:
        t.start()
    # 等待子线程结束
    for t in threads:
        t.join()  
     
    # 打印执行结果
    print total
    print "程序结束运行%s" % datetime.datetime.now()
