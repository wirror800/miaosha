#!/bin/bash
function robit {
php run.php $1
}
tmp_fifofile="/tmp/$.fifo"   # 脚本运行的当前进程ID号作为文件名
mkfifo $tmp_fifofile         # 新建一个随机fifo管道文件
exec 6<>$tmp_fifofile        # 定义文件描述符6指向这个fifo管道文件
rm $tmp_fifofile
thread=`cat tel.txt | wc -l`
for ((i=0;i<$thread;i++));do # for循环 往 fifo管道文件中写入N个空行
echo
done >&6
while read input
do
read -u6                    # 从文件描述符6中读取行（实际指向fifo管道)
{
robit ${input};             # 执行pinghost函数
echo >&6                    # 再次往fifo管道文件中写入一个空行。
}&                          # 放到后台执行
done<tel.txt
wait                        #因为之前的进程都是后台执行，因此要有wait来等待所有的进程都执行完毕后才算整个脚本跑完。
exec 6>&-                   #删除文件描述符6
exit 0