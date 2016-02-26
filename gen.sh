#!/bin/bash
function isint () {
    if [ $# -lt 1 ]; then
        return 0
    fi

    if [[ $1 =~ ^-?[1-9][0-9]*$ ]]; then
        return 1
    fi

    if [[ $1 =~ ^0$ ]]; then
        return 1
    fi

    return 0
}

cnt=$1
isint $cnt
if [ $? = 0 ]; then
        cnt=0
else
        if [ -f "tel.txt" ]; then
                rm tel.txt
        fi
        touch tel.txt
fi

prefix="186"
for ((i=0;i<$cnt;i++));
do
        patch=""
        len=`expr length "$i"`
        counter=$(( 8-$len ))
        while [ $counter -gt 0 ]
        do
                patch=${patch}"0"
                counter=$(( $counter - 1 ))
        done
        echo ${prefix}${patch}${i}>>tel.txt
done
exit 0