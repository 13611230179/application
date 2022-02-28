<?php
  
   /**
    * 增量元素之间的最大差值
    * @desc 前缀最小值，时间复杂度：O(n)，我们只需要对数组 $nums 进行一次遍历，空间复杂度：O(1)
    * @return int
    * @author gengjianhao
    * @time 2022/02/26 18:00
    */
   function maximumDifference($nums) {
        $length = count($nums);
        $ans = -1;
        $minNum = $nums[0];
        for ($i = 1; $i < $length; ++$i) {
            if ($nums[$i] > $minNum) {
                $tmpAns = $nums[$i] - $minNum;
                $ans = $ans > $tmpAns ? $ans : $tmpAns;
            } else {
                $minNum = $nums[$i];
            }
        }
        return $ans;
   }

    /**
     * 两数之和(暴力美学版)
     * @param Interget[] $nums
     * @param Interget $target
     * @return array
     * @author gengjianhao
     * @time 2022/02/27 14:30
     */
    function twoSumForBruteForce($nums, $target) {
        $res = array();
        $length = count($nums);
        if ($length < 2) return $res;

        for($i = 0; $i < $length; $i++) {
            for($j = 1; $j < $length; $j++) {
                if ($nums[$j] == $target - $nums[$i]) {
                    $res = array($i, $j);
                    break 2;
                }
            }
        }
        return $res;
    }

    /**
     * 两数之和(array_flip版)
     * @param Interget[] $nums
     * @param Interget $target
     * @return array
     * @author gengjianhao
     * @time 2022/02/27 14:44
     */
    function twoSumForArrayFlip($nums, $target) {
        $res = array();
        //反转查询数组
        $reverseNums= array_flip($nums);

        //foreach效率比for效率好些
        foreach ($nums as $key => $val) {
            //另一个值
            $anotherVal = $target - $val;
            //如果 这个值存在的话，而且不是当前的键对应的，那么就找到一个
            if(isset($reverseNums[$anotherVal]) && $reverseNums[$anotherVal] != $key){
                $res = array($key, $reverseNums[$anotherVal]);
                break;
            }
        }
        return  $res;
    }

    /**
     * 两数之和(HashMap版,PHP中的数组满足key=>val)
     * @param Interget[] $nums
     * @param Interget $target
     * @return array
     * @author gengjianhao
     * @time  2022/02/27  15:03
     */
    function twoSumForHashTable($nums, $target) {
        $res = $hashTable = [];

        //foreach效率比for效率好些
        foreach ($nums as $key => $val) {
            //另一个值
            $anotherVal = $target - $val;

            //如果另一个值出现在hashTable中结束循环
            if (isset($hashTable[$anotherVal])) {
                $res = array($hashTable[$anotherVal], $key);
                break;
            }
            $hashTable[$val] = $key;
        }
        return $res;
    }

    /**
     * 无重复字符的最长子串(暴力美学版)
     * @param String $s
     * @return Integer
     * @author gengjianhao
     * @time  2022/02/28 16:39
     */
    function lengthOfLongestSubstringForBruteForce($s) {
        // 字符串转数组
        $strs = str_split($s);
        // 字符串长度
        $length = count($strs);
        // 最大字符长度
        $longStrNum = 0;
        // 最大字符串数组
        // $longStrs = array();

        for ($i = 0;  $i < $length; $i++) {
            // 临时最长字符串数组
            $tmpLongStrs = array();
            for ($j = $i; $j < $length; $j++) {
                if (!in_array($strs[$j], $tmpLongStrs)) {
                    array_push($tmpLongStrs, $strs[$j]);
                    //***注意****以下这段不能放在break上，如果最长字符串直接循环到数组末尾就不会再执行以下代码
                    $tmpLongStrNum = count($tmpLongStrs);
                    if ($tmpLongStrNum > $longStrNum) {
                        $longStrNum = $tmpLongStrNum;
                        // $longStrs = $tmpLongStrs;
                    }
                } else {
                    break;
                }
            }
        }

        return $longStrNum;
    }

?>
